<?php
/**
 * Created by PhpStorm.
 * User: YONGMAN LEE
 * Date: 2020-07-19
 * Time: 오후 10:04
 */

namespace App\Http\Controllers;

use App\GameAccount;
use App\User;
use http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\GameSafeMoney;
use App\GameSafeMoneyLog;
use App\Point;
use App\GameInfo;
use Carbon\Carbon;

class MypageController extends Controller
{
    public function index()
    {
        $userOrigPoint = Point::where(['user_id' => Auth::user()->id,'use_point' => '0'])->orderBy('id','desc')->sum('point');
        $userUsePoint = Point::where(['user_id' => Auth::user()->id,'point' => '0'])->orderBy('id','desc')->sum('use_point');


		$userPoint = $userOrigPoint - $userUsePoint;

        $playerData = null;
        $gameInfo = null;
        //$gameInfo = GameInfo::where(['name'=>'holdem'])->latest()->first();
        //$playerData = DB::connection('mssql')->table('Account')->where('AccountID', Auth::user()->username)->select('AccountIdx')->first();

        if($playerData) {
            $game_player = DB::connection('mssql')->table('Player')->where('AccountUniqueid', $playerData->AccountIdx)->select('PlayerName', 'Have_Money')->first();
        }else{
            $game_player = '';
        }


        if($game_player){
            $nickname = $game_player->PlayerName;
        }else{
            $nickname = '';
        }


        $game_safe_money = GameSafeMoney::where(['user_id' => Auth::user()->id])->select('safe_money')->first();
        $GameCommandMoney = 0;
        if($playerData){
            $userSafePointData = DB::connection('mssql')->table('t_safer')->where(['AccountuniqueID' => $playerData->AccountIdx,'flag' => '0'])->get();

            if($userSafePointData->count() > 0) {

                foreach($userSafePointData as $row){

                    $userSafePointLogInsert = GameSafeMoneyLog::create([
                        'user_id' => Auth::user()->id,
                        'safer_id' => $row->AccountuniqueID,
                        'safe_money' => $row->safe_money,
                    ]);
                }

                $create_trigger = true;
                $safe_money = 0;
                if($game_safe_money){
                    $create_trigger= false;
                    $safe_money = $game_safe_money->safe_money;
                }

                $userSafePoint = $safe_money + $userSafePointData->sum('safe_money');

                if($create_trigger){
                    $safePointInsertData = GameSafeMoney::create(['user_id'=>Auth::user()->id,'safe_money'=>$userSafePoint,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]);
                }else{
                    $safePointInsertData = GameSafeMoney::where(['user_id'=>Auth::user()->id])->update(['safe_money'=>$userSafePoint,'updated_at' => date('Y-m-d H:i:s')]);
                }

                $userMsSql= DB::connection('mssql')->table('t_safer')->where(['AccountuniqueID' => $playerData->AccountIdx,'flag' => '0'])->update(['flag' => 1,'update'=>date('Y-m-d H:i:s.v')]);
            }else{
                $userSafePoint= ($game_safe_money)?$game_safe_money->safe_money:0;
            }

            //game_safe_money -> 포인트로 이동
            /*if($userSafePoint > 0){
                $userOrigPoint = Point::where(['user_id' => Auth::user()->id,'use_point' => '0'])->orderBy('id','desc')->sum('point');
                $userUsePoint = Point::where(['user_id' => Auth::user()->id,'point' => '0'])->orderBy('id','desc')->sum('use_point');
                $userPoint = $userOrigPoint - $userUsePoint;

                //$userSafePointUpdate = GameSafeMoney::where('user_id',Auth::user()->id)->update($param);

                $gameid = DB::connection('mssql')->table('Account')->where('AccountID', Auth::user()->username)->value('AccountIDx');

                $pointData = Point::create([
                    'user_id' => Auth::user()->id,
                    'po_content' => 'send_web',
                    'point' => $userSafePoint / $gameInfo->chip_rate,
                    'use_point' => 0,
                    'mb_point' => $userPoint,
                    'game_id' => $gameid
                ]);

                $safePointUpdate = GameSafeMoney::where(['user_id'=>Auth::user()->id])->update(['safe_money'=>'0','updated_at' => date('Y-m-d H:i:s')]);

                $userOrigPoint = Point::where(['user_id' => Auth::user()->id,'use_point' => '0'])->orderBy('id','desc')->sum('point');
                $userUsePoint = Point::where(['user_id' => Auth::user()->id,'point' => '0'])->orderBy('id','desc')->sum('use_point');


                $userPoint = $userOrigPoint - $userUsePoint;

            }*/


           // $GameCommandMoney = DB::connection('mssql')->table('t_Command')->where(['AccountUniqueID'=> $playerData->AccountIdx])->sum('val1');
        }else{
            $userSafePoint= 0;
        }

        if(!$game_player){
            $gamePoint = 0;
        }else{

            $gamePoint = substr($game_player->Have_Money, 0,-8);
        }

        if($gamePoint == false){
            $gamePoint = 0;
        }

        return view('users.mypage.mypage')->
        with([
            'userPoint' => $userPoint,
            'gameInfo' => $gameInfo,
            'gamePoint' => $gamePoint + $GameCommandMoney,
            'userSafePoint' => $userSafePoint,
            'nickName' => $nickname
        ]);
    }

    public function password()
    {

        return view('users.mypage.password');
    }

    public function pincode()
    {

        return view('users.mypage.pincode');
    }

    public function account()
    {

        return view('users.mypage.account');
    }

    public function rewritePassword(Request $request){
        $this->validate($request, [
            'current_password'=> 'required|min:6|max:20',
            'password'=> 'required|min:6|max:20',
            'password_confirmation' => 'same:password'
        ]);

        if (!Hash::check($request->input('current_password'), Auth::user()->password)) {

            return redirect()->back()->withInput()->withErrors(array('current_password'=>trans('mypage.error.currentPassword')));
            //add logic here
        }


        if(Hash::check($request->input('password'), Auth::user()->password)){
            return redirect()->back()->withInput()->withErrors(array('password'=>trans('mypage.error.samePassword')));
        }

        $param = [
            'password' => bcrypt($request->input('password')),
            'temp_password' => $request->input('password'),
        ];


        $userData = User::where('id',Auth::user()->id)->update($param);


        //게임DB 회원 비밀번호도 변경 해준다.
        /*$game_user = GameAccount::where('AccountIDx', Auth::user()->account_id)->first();
        if ($game_user){
            DB::connection('mssql')->table('Account')->where('AccountIDx', Auth::user()->account_id)->update(
                ['PassWord' => $request->input('password')]
            );
        }*/

        auth()->logout();
        return redirect()->route('sessions.create');

    }

    public function rewriteAccount(Request $request){


        $param = [
            'bank' => $request->input('bank'),
            'account' => $request->input('account'),
            'holder' => $request->input('holder'),
        ];

        try {
            $userData = User::where('id',Auth::user()->id)->update($param);
        } catch (Exception $e) {
            return redirect()->back();
        }


        return redirect()->route('mypage');

    }

    public function rewritePincode(Request $request){
        $request->merge(['current_pin_password' =>implode('',$request->get('current_pin_password'))]);
        $request->merge(['pin_password' =>implode('',$request->get('pin_password'))]);
        $request->merge(['pin_password_confirm'=>implode('',$request->get('pin_password_confirm'))]);


        if($request->get('current_pin_password') != Auth::user()->withdrawal_password){
            return redirect()->back()->withErrors(array('pin_error'=> trans('mypage.error.currentPinPassword')));
        }

        if($request->get('pin_password') == Auth::user()->withdrawal_password){
            return redirect()->back()->withErrors(array('pin_error'=> trans('mypage.error.samePinPassword')));
        }


        if($request->get('pin_password') != $request->get('pin_password_confirm')){
            return redirect()->back()->withErrors(array('pin_error' => trans('mypage.error.newSamePinPassword')));
        }

        if(mb_strlen($request->get('pin_password')) < 4){
            return redirect()->back()->withErrors(array('pin_error' => trans('auth.join_process.pincode_length')));
        }





//        $this->validate($request, [
//            'pin_password'=> 'required|min:4|max:4',
//            'pin_password_confirm' => 'same:pin_password',
//        ]);


        $param = [
            'withdrawal_password' => $request->input('pin_password'),
            'activated' => 1
        ];

        $userData = User::where('id',Auth::user()->id)->update($param);



        //return redirect()->back()->with('stepParams',$stepRequest);
        auth()->logout();
        return redirect()->route('sessions.create');

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
