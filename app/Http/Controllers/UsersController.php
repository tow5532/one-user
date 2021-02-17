<?php

namespace App\Http\Controllers;

use App\SlotGameAuth;
use App\User;
use Carbon\Carbon;
use http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use App\Recommends;
use App\Roleorder;
use App\Role;
use App\Roleuser;
use App\Point;

class UsersController extends Controller
{
    protected function redirectTo()
    {
        return '/auth/finish';
    }
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create()
    {
        return view('users.create');
    }

    public function bank(Request $request){
        $stepDatas = $request->session()->get('stepParams');
        if($stepDatas == null){
            return redirect()->back();
        }

        return view('users.bank')->with(['idx'=>$stepDatas['id'],'key'=>$stepDatas['key'],'stepKey' => $stepDatas['stepKey']]);
    }

    public function pincode(Request $request){
        $stepDatas = $request->session()->get('stepParams');
        if($stepDatas == null){
            return redirect()->back();
        }

        return view('users.pincode')->with(['idx'=>$stepDatas['id'],'key'=>$stepDatas['key'],'stepKey' => $stepDatas['stepKey']]);
    }

    public function finish(Request $request){

        if($request->session()->has('idx')) {
            Auth::loginUsingId($request->session()->get('idx'));
        }

        return view('users.finish');
    }


    public function userCreate(Request $request)
    {
        $this->validate($request, [
            'id'=> 'required|regex:/^[A-Za-z][A-Za-z0-9]*$/|min:6|max:12|unique:users',
            'password'=> 'required|min:6|max:20',
            'password_confirmation' => 'same:password',
            'refer_id' => 'required',
            //'facebook' => 'max:50',
        ]);

        //아이디 중복체크
        $userData = User::where(['username'=>$request->input('id')])->count();
        if($userData > 0){
            return redirect()->back()->withInput()->withErrors(array('id'=>trans('auth.join_process.same_id')));
        }
        //추천인 코드
        $referID = $request->input('refer_id');

        //추천인 코드가 회원디비에 있는지 확인
        $userData = User::where(['username'=>$referID,'activated'=>1])->count();

        if((int)$userData === 0){
            return redirect()->back()->withInput()->withErrors(array('refer_id'=>trans('auth.join_process.refer_id').''));
        }

        $userReferData = User::where(['username'=>$referID,'activated'=>1])->first();

        $ReferRoleData = Role::where(['slug'=>'store'])->leftJoin('admin_roles_order', 'admin_roles.id' ,'=' ,'admin_roles_order.roles_id' )
            ->select( 'admin_roles.id','admin_roles_order.orderby AS store_order')->first();

        $ReferRoleUserData = Roleuser::where(['admin_role_users.user_id'=>$userReferData->id])->leftJoin('admin_roles_order', 'admin_role_users.role_id' ,'=' ,'admin_roles_order.roles_id' )
            ->select( 'role_id','orderby AS user_order')->first();

        if(is_null($ReferRoleUserData)){
            return redirect()->back()->withInput()->withErrors(array('refer_id'=>trans('auth.join_process.refer_id').''));
        }

        if($ReferRoleData->store_order !== $ReferRoleUserData->user_order){
            return redirect()->back()->withInput()->withErrors(array('refer_id'=>trans('auth.join_process.refer_id').''));
        }


        //비밀번호 request 문제로 인해 1차적으로 DB 저장
        $user = User::create([
            'username' => $request->input('id'),
            'name' => $request->input('id'),
            //'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            //'confirm_code' => $confirm_code,
            'temp_password' => $request->input('password'),
            'confirm_code' => $referID,
			//'facebook' => $request->input('facebook')
        ]);


        $stepRequest = array(
            'id' => $request->input('id'),
            'key' => md5(uniqid(rand(), true)),
            'stepKey' => Crypt::encryptString($request->input('stepKey'))
        );

        //Step2로 request 이동
        return redirect()->route('users.bank')->with('stepParams',$stepRequest);
    }

    public function createBank(Request $request){


        $stepRequest = [
            'id' => $request->input('idx'),
            'key' => $request->input('key'),
            'stepKey' => Crypt::encryptString($request->input('stepKey'))
        ];
        $param = [
            'bank' => $request->input('bank'),
            'account' => $request->input('account'),
            'holder' => $request->input('holder'),
        ];

        try {
            $userData = User::where('username',$request->input('idx'))->update($param);
        } catch (Exception $e) {
            return redirect()->back()->with('stepParams',$stepRequest);

        }

        //$after = User::find($request->input('idx'));


        //return redirect()->back()->with('stepParams',$stepRequest);

        //Step2로 request 이동

        $after = User::where('username',$request->input('idx'))->first();

        if(!is_null($after->withdrawal_password) && mb_strlen($after->withdrawal_password) == '4'){
            $param = [
                'activated' => 1
            ];
            $userData = User::where('username',$request->input('idx'))->update($param);

            $request->session()->put('joins','finish');
            $request->session()->put('idx' , $after->id);


            /*$pointData = Point::create([
                'user_id' => $userData->id,
                'po_content' => 'join_event',
                'point' => (!is_null($userData->facebook))?60000:50000,
                'use_point' => 0,
                'mb_point' => 0,
                'game_id' => 1
            ]);*/



            return redirect()->route('users.finish');

        }


        return redirect()->route('users.pincode')->with('stepParams',$stepRequest);
    }


    public function createPincode(Request $request){

        $request->merge(['pin_password' =>implode('',$request->get('pin_password'))]);
        $request->merge(['pin_password_confirm'=>implode('',$request->get('pin_password_confirm'))]);

        $stepRequest = [
            'id' => $request->input('idx'),
            'key' => $request->input('key'),
            'stepKey' => Crypt::encryptString($request->input('stepKey'))
        ];

        if($request->get('pin_password') != $request->get('pin_password_confirm')){
            return redirect()->back()->with('stepParams',$stepRequest)->withErrors(array('refer_id' => trans('auth.join_process.pincode_match')));
        }

        if(mb_strlen($request->get('pin_password')) < 4){
            return redirect()->back()->with('stepParams',$stepRequest)->withErrors(array('refer_id' => trans('auth.join_process.pincode_length')));
        }


//        $this->validate($request, [
//            'pin_password'=> 'required|min:4|max:4',
//            'pin_password_confirm' => 'same:pin_password',
//        ]);




        $userData = User::where('username',$request->input('idx'))->first();


        /*$id = DB::connection('mssql')->table('Account')->insertGetId([
            //AccountID, PassWord, LoginType
            'AccountID' => $userData->username,
            'PassWord' => $userData->temp_password,
            'LoginType' => 'sunpoker',
        ]);*/

        //게임DB 에 회원정보 등록
        $session_id = Str::random(80) . '' .  $userData->id;
        $id = SlotGameAuth::insertGetId([
            'CertificationKey' => $session_id,
            'UpdateDate' => Carbon::now(),
        ]);



        $referId = User::where('username',$userData->confirm_code)->select('id')->first();

        $userBeforeRecommendData = Recommends::where('user_id' , $userData->id)->count();

        if($userBeforeRecommendData == 0 || !is_null($referId)) {
            $recommendData = Recommends::where('user_id', $referId->id)->latest('id')->first();

            if (is_null($recommendData)) {
                $user = Recommends::create([
                    'recommend_id' => 0,
                    'user_id' => $userData->id,
                    'step1_id' => $userData->id,
                ]);
            } else {

                $step_5 = null;
                $step_4 = null;
                $step_3 = null;
                $step_2 = null;
                $step_1 = null;
                if (!is_null($recommendData->step4_id) || !is_null($recommendData->step5_id)) {
                    $step_1 = $recommendData->step1_id;
                    $step_2 = $recommendData->step2_id;
                    $step_3 = $recommendData->step3_id;
                    $step_4 = $recommendData->step4_id;
                    $step_5 = $userData->id;

                } else if (!is_null($recommendData->step3_id)) {
                    $step_1 = $recommendData->step1_id;
                    $step_2 = $recommendData->step2_id;
                    $step_3 = $recommendData->step3_id;
                    $step_4 = $userData->id;

                } else if (!is_null($recommendData->step2_id)) {
                    $step_1 = $recommendData->step1_id;
                    $step_2 = $recommendData->step2_id;
                    $step_3 = $userData->id;

                } else {
                    $step_1 = $recommendData->step1_id;
                    $step_2 = $userData->id;

                }


                $params = [
                    'recommend_id' => $referId->id,
                    'user_id' => $userData->id,
                    'step1_id' => $step_1,
                    'step2_id' => $step_2,
                    'step3_id' => $step_3,
                    'step4_id' => $step_4,
                    'step5_id' => $step_5,
                ];


                $user = Recommends::create($params);
            }
        }


        ##추천인 로직 추가건
        $ReferRoleData = Role::where(['slug'=>'store'])->leftJoin('admin_roles_order', 'admin_roles.id' ,'=' ,'admin_roles_order.roles_id' )->select( 'admin_roles.id','admin_roles_order.orderby AS store_order')->first();
        $NextRoleOrderData = Roleorder::where('orderby','>',$ReferRoleData->store_order)->select('roles_id AS next_role_id')->orderBy('orderby','asc')->first();

        $userInsert = Roleuser::create([
           'role_id'  => $NextRoleOrderData->next_role_id,
           'user_id'  => $userData->id,
        ]);


        $param = [
            'withdrawal_password' => $request->input('pin_password'),
            'activated' => 1,
			'account_id' => $id
        ];

        try {
            $userData = User::where('username',$request->input('idx'))->update($param);
        } catch (Exception $e) {
            return redirect()->back()->with('stepParams',$stepRequest);

        }


        $userData = User::where('username',$request->input('idx'))->first();
        //return redirect()->back()->with('stepParams',$stepRequest);
        $request->session()->put('joins','finish');
        $request->session()->put('idx' , $userData->id);

        /*$pointData = Point::create([
            'user_id' => $userData->id,
            'po_content' => 'join_event',
            'point' => (!is_null($userData->facebook))?60000:50000,
            'use_point' => 0,
            'mb_point' => 0,
            'game_id' => 1
        ]);*/

        //if (Auth::attempt(['username' => $request->input('idx'), 'password' => Crypt::decryptString($request->input('stepKey'))]))
        //{
            return redirect()->route('users.finish');
        //}

        //Step2로 request 이동
        //return redirect()->route('users.finish');
    }


//    public function store(Request $request)
//    {
//        $this->validate($request, [
//            'username'=> 'required|alpha_num|min:6|max:20|unique:users',
//            'password'=> 'required|min:6|max:15',
//            'password_confirmation' => 'same:password',
//            'bank' => 'max:50',
//            'account' => 'max:50',
//            'holder' => 'max:50',
//            'withdrawal_password' => 'required',
//            'phone' => 'max:30',
//            'facebook' => 'max:50',
//            //'refer_id' => 'required|exists:users',
//            //'refer_id' => 'required',
//        ]);
//
//        $user = User::create([
//            'username' => $request->input('username'),
//            //'email' => $request->input('email'),
//            'password' => bcrypt($request->input('password')),
//            //'confirm_code' => $confirm_code,
//            'temp_password' => $request->input('password'),
//            'bank' => $request->input('bank'),
//            'account' => $request->input('account'),
//            'holder' => $request->input('account'),
//            'withdrawal_password' => $request->input('withdrawal_password'),
//            'phone' => $request->input('phone'),
//            'facebook' => $request->input('facebook'),
//        ]);
//
//        /*
//        \Mail::send('emails.auth.confirm', compact('user'), function ($message) use ($user) {
//           $message->to($user->email);
//           $message->subject(
//             sprintf('[%s] 회원 가입을 확인해 주세요.', config('app.name'))
//           );
//        });*/
//
//        //event(new \App\Events\UserCreated($user));
//
//        //return $this->respondCreated('가입하신 메일 계정으로 인증 메일을 발송하였습니다. 확인해 주세요.');
//        //return $this->respondCreated(trans('auth.users.info_confirmation_sent'), 'auth/login');
//        return $this->respondCreated(trans('auth.users.info_join_success'), 'auth/login');
//    }


    public function mailConfirmResend($usermail){
        $user = User::whereEmail($usermail)->first();
        event(new \App\Events\UserCreated($user));

        flash(trans('auth.users.info_confirmation_sent'));
        return redirect('auth/login');
    }

    public function respondCreated($message, $link)
    {
        flash($message);
        return redirect($link);
    }


    public function confirm($code)
    {
        $user = User::where('confirm_code', $code)->first();
        if (! $user){
            flash()->error(trans('auth.users.error_wrong_url'));
            return redirect('auth/login');
        }
        //블록체인 회원가입 API 연동
        /*$client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://210.109.100.53:8080/api/adduser/tbcchannel/adduser', [
            'query' => [
                'userid' => $user->email,
                'userpw' => $user->password,
            ]
        ]);
        $response = $response->getBody()->getContents();
        $resDeArr = json_decode($response, true);
        //dd($resDeArr);

        $packetid   = $resDeArr['packetid'];
        $err        = $resDeArr['err'];
        $userid     = $resDeArr['userid'];

        if ($err != '1'){
            $msgArr = trans('error.api');
            flash()->error($msgArr[$err]);
            return redirect('auth/login');
        }

        if ($err == '1') {
            $user->activated = 1;
            $user->confirm_code = null;
            $user->email_verified_at = now();
            $user->save();
            //auth()->login($user);
            flash(
                trans('auth.users.info_confirmed', ['name' => $user->name])
            );

            return redirect('auth/login');
        }*/

        $user->activated = 1;
        $user->confirm_code = null;
        $user->email_verified_at = now();
        $user->save();

        //게임DB 회웥 테이블에 등록
       /* $id = DB::connection('mssql')->table('Account')->insertGetId([
            //AccountID, PassWord, LoginType
            'AccountID' => $user->email,
            'PassWord' => $user->temp_password,
            'LoginType' => 'tobigca',
        ]);

        DB::connection('mssql')->table('t_Command')->insert([
            //AccountUniqueid, PlayerName
            'AccountUniqueid' => $id,
            'command' => 'join_money',
            'val1' => '200000',
        ]);*/

        flash(
            trans('auth.users.info_confirmed', ['name' => $user->name])
        );

        return redirect('auth/login');
    }

    public function checkBankAccount(Request $request)
    {
        $this->validate($request, [
            'bank_account'=> 'required',
        ]);

        $user = User::where('account', $request->get('bank_account'))->count();

        if ($user > 0){
            return response()->json(['errors'=>'The same account number exists.', 'result' => 0]);
        }

        return response()->json(['errors'=> null, 'result' => 1]);
    }
}
