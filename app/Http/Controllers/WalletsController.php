<?php

namespace App\Http\Controllers;

use App\Inquote;
use App\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Amountdata;
use App\HistoryDeleteLog;
use App\BankAccount;
use App\Deposit;
use App\DepositMin;
use App\Refund;
use App\RefundMin;
use App\Refundquote;
use App\RefundStep;
use App\Point;

class WalletsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $depoit_min = DepositMin::first()->min_count;
        $inquote = Inquote::first()->price;


        if(is_null(Auth::user()->bank) || is_null(Auth::user()->account) || is_null(Auth::user()->holder)){
            return redirect('mypage/account');
        }


        return view('wallets.index')->with(['depositMin'=>$depoit_min,'inquote' => $inquote]);
    }

    public function index_test()
    {
        $depoit_min = DepositMin::first()->min_count;
        $inquote = Inquote::first()->price;


        if(is_null(Auth::user()->bank) || is_null(Auth::user()->account) || is_null(Auth::user()->holder)){
            return redirect('mypage/account');
        }


        return view('wallets.index_test')->with(['depositMin'=>$depoit_min,'inquote' => $inquote]);
    }

    public function withdrawals()
    {

        $refundMin = RefundMin::first()->min_count;
        $inquote = Refundquote::first()->price;

        $userOrigPoint = Point::where(['user_id' => Auth::user()->id,'use_point' => '0'])->orderBy('id','desc')->sum('point');
        $userUsePoint = Point::where(['user_id' => Auth::user()->id,'point' => '0'])->orderBy('id','desc')->sum('use_point');


		$userPoint = $userOrigPoint - $userUsePoint;


        return view('wallets.withdrawals')->with(['refundMin'=>$refundMin,'inquote' => $inquote, 'userPoint' => $userPoint]);
    }

    public function withdrawals_test()
    {

        $refundMin = RefundMin::first()->min_count;
        $inquote = Refundquote::first()->price;

        $userOrigPoint = Point::where(['user_id' => Auth::user()->id,'use_point' => '0'])->orderBy('id','desc')->sum('point');
        $userUsePoint = Point::where(['user_id' => Auth::user()->id,'point' => '0'])->orderBy('id','desc')->sum('use_point');


        $userPoint = $userOrigPoint - $userUsePoint;


        return view('wallets.withdrawals_test')->with(['refundMin'=>$refundMin,'inquote' => $inquote, 'userPoint' => $userPoint]);
    }


    public function userDeposit()
    {
        $userOrigPoint = Point::where(['user_id' => Auth::user()->id,'use_point' => '0'])->orderBy('id','desc')->sum('point');
        $userUsePoint = Point::where(['user_id' => Auth::user()->id,'point' => '0'])->orderBy('id','desc')->sum('use_point');


		$userPoint = $userOrigPoint - $userUsePoint;

        return json_encode(['userDeposit' => $userPoint]);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function depositsCreate(Request $request)
    {

        $request->merge(['amounts' => str_replace(',','',$request->get('amounts'))]);
        $request->merge(['deposit_amounts' => str_replace(',','',$request->get('deposit_amounts'))]);

        $this->validate($request, [
            'amounts'=> 'required',
        ]);

        $depoit_min = DepositMin::first()->min_count;

        if($request->get('amounts') < $depoit_min){

            return response()->json(['errors'=>['amounts' => 'The minimum deposits is '.$depoit_min.'.'], 'result' => 0]);
            //return redirect()->back()->withInput()->withErrors(array('amounts'=>'The minimum deposits is '.$depoit_min.'.'));
        }


        $bank_Account = BankAccount::where(['user_id'=>Auth::user()->id])->first();
        if( BankAccount::where(['user_id'=>Auth::user()->id])->count() == 0){
            $bank_Account = BankAccount::first();
        }

        $inquote = Inquote::first();

        $charge_amount = $request->get('amounts') * $inquote->price;


        $amountData = Deposit::create([
            'user_id' => Auth::user()->id,
            'step_id' => '1',
            'amount' => $request->get('amounts'),
            'charge_amount' => $charge_amount,
            'quote' => $inquote->price,
            'bank' => Auth::user()->bank,
            'account' => Auth::user()->account,
            'holder' => Auth::user()->holder,
            'header_info' => $request->server('HTTP_USER_AGENT'),
            'ip' => $request->ip()
        ]);


        $account = array(
           'bank' => $bank_Account->bank,
            'account' => $bank_Account->account,
            'holder' => $bank_Account->holder,
            'result' => 1
        );

        //텔레그램 메시지 전송
        sendTelegramMsgDeposit(Auth::user()->id, $request->get('amounts'));

        return response()->json($account);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function withdrawalsCreate(Request $request)
    {


        $request->merge(['withdrawals_amounts' => str_replace(',','',$request->get('withdrawals_amounts'))]);
        $request->merge(['pin_password' =>implode('',$request->get('pin_password'))]);

        $this->validate($request, [
            'withdrawals_amounts'=> 'required',
        ]);

        $withdrawal_min = RefundMin::first()->min_count;

       $userOrigPoint = Point::where(['user_id' => Auth::user()->id,'use_point' => '0'])->orderBy('id','desc')->sum('point');
        $userUsePoint = Point::where(['user_id' => Auth::user()->id,'point' => '0'])->orderBy('id','desc')->sum('use_point');


		$userPoint = $userOrigPoint - $userUsePoint;


        if(!$userPoint ||  $request->get('withdrawals_amounts') > $userPoint){
            return response()->json(['errors'=>['withdrawals_amounts' => ['출금은 가능금액을 초과 할 수 없습니다.']], 'result' => 0]);
        }


        if($request->get('withdrawals_amounts') < $withdrawal_min){

            return response()->json(['errors'=>['withdrawals_amounts' => ['최소 출금 액 은  '.$withdrawal_min.'.']], 'result' => 0]);
            //return redirect()->back()->withInput()->withErrors(array('amounts'=>'The minimum deposits is '.$depoit_min.'.'));
        }

        if($request->get('pin_password') != Auth::user()->withdrawal_password){
            return response()->json(['errors'=>['withdrawals_amounts' => ['PIN 비밀번호가 다릅니다. 다시 확인 해주세요.']], 'result' => 0, 'form_reset' => 1]);
        }

        $Refundquote = Refundquote::first();

        if(is_null(Auth::user()->bank) || is_null(Auth::user()->account) || is_null(Auth::user()->holder)){
            return response()->json(['errors'=>['withdrawals_amounts' => ['은행 계좌 정보를 찾을 수 없습니다. 은행 계좌를 확인하십시오.']], 'result' => 0]);
        }

        $amountData = Refund::create([
            'user_id' => Auth::user()->id,
            'step_id' => '1',
            'amount' => $request->get('withdrawals_amounts'),
            'money_amount' => $request->get('withdrawals_amounts')  / $Refundquote->price,
            'quote' => $Refundquote->price,
            'bank' => Auth::user()->bank,
            'account' => Auth::user()->account,
            'holder' => Auth::user()->holder,
            'delete' => 0
        ]);

        Point::create([
            'user_id' => Auth::user()->id,
			'deposit_id' => 0,
            'refund_id' => $amountData->id,
            'po_content' => 'withdraw',
            'point' => '0',
            'use_point' => $request->get('withdrawals_amounts')  / $Refundquote->price,
            'mb_point' => $userPoint - ($request->get('withdrawals_amounts')  / $Refundquote->price),
        ]);

        $return = array(
            'balanceAmounts'=>'',
         'result' => 1
        );

        //테렐그램 메시지 전송
        sendTelegramMsgWithDrawl(Auth::user()->id, $request->get('withdrawals_amounts'));

        return response()->json($return);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'wname'=> 'required|max:50',
        ]);

        /*$client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://210.109.100.53:8080/api/addwallet/tbcchannel/addwallet', [
            'query' => [
                'userid' => Auth::user()->email,
                'walletname' => $request->input('wname'),
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
            return $this->respondError($msgArr[$err]);
        }*/

        //회원아이디
        $userId = Auth::user()->id;

        //기존에 해당 코인카테고리지갑주소가 등록되어있는지 확인
        $result = Wallet::where('user_id' , $userId)->where('use_yn', 'Y')->count();

        if ($result > 0){
            return $this->respondError(trans('wallets.error.same'));
        }

        //임의 지갑 주소 생성
        $addr = $this->generateSerialNumber(50);
        //지갑등록
        Wallet::create([
            'user_id' =>  $userId,
            'addr' => $addr,
            'name' => $request->input('wname'),
        ]);

        return $this->respondCreated(trans('wallets.create.success'), 'wallet');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('wallets.show')->with('addr', $id);
    }




}
