<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokensController extends Controller
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
        //지갑정보
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://112.169.90.130:7070/api/myinfo/tbcchannel/'.Auth::user()->email);

        $response = $response->getBody()->getContents();
        $resDeArr = json_decode($response, true);
        //dd($resDeArr);
        $packetid = $resDeArr['packetid'];
        $errCode = $resDeArr['err'];
        $wallets = ($resDeArr['wallets'] == null) ? array() : $resDeArr['wallets'];

        if (! isset($packetid)){
            $msgArr = trans('error.api');
            flash()->error($msgArr[$errCode]);
        }

        return view('wallets.send', compact('wallets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'address'=> 'required',
            'receive' => 'required',
            'amount' => 'required',
        ]);

        //amount check
        $amount         = trim($request->input('amount'));
        $reAmount       = '';
        $leftNumber     = '';

        if (strpos($amount, '.')) {
            $amountArr = explode('.', $amount);
            $leftAmount = $amountArr[0];
            $rightAmount = $amountArr[1];

            if ($leftAmount != '') {
                $leftNumber = $leftAmount;
                // 양수자리에 앞에 0이 있는경우
                if (substr($leftAmount, 0, 1) == '0' && strlen($leftAmount) > 1) {
                    $leftNumber = substr($leftAmount, 1, strlen($leftAmount));
                    //dd($leftNumber, '-----');
                }
                //양수자리에 0이 있으면 없애줌\
                if (substr($leftAmount, 0, 1) == '0'){
                    $leftNumber = substr($leftAmount, 1, strlen($leftAmount));
                    //dd($leftNumber, '-----');
                }


                //소수점 8자리 확인
                $lengthCnt = 8;
                $rightLen = strlen($rightAmount);
                $sum = $lengthCnt - $rightLen;
                if ($sum > 0) {
                    for ($i = 1; $i < $sum + 1; $i++) {
                        $rightAmount = $rightAmount . '' . '0';
                    }
                }
                $reAmount = $leftNumber . '' . $rightAmount;
            }
        }
        $reAmount = ($reAmount === '') ? $amount. ''. '00000000' : $reAmount;
        //dd($reAmount);


        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://112.169.90.130:7070/api/transfer/tbcchannel/transfer', [
            'query' => [
                'sender'    => $request->input('address'),
                'receiver'  => $request->input('receive'),
                'amount'    => $reAmount,
                'tokenname' => 'TOC',
            ]
        ]);

        $response = $response->getBody()->getContents();
        $resDeArr = json_decode($response, true);
        //dd($resDeArr);

        $packetid   = $resDeArr['packetid'];
        $err        = $resDeArr['err'];


        if ($err != '1'){
            $msgArr = trans('error.api');
            return response()->json(['success' => 'fail', 'message' => $msgArr[$err], 'sender' => $request->input('address')]);
        }

        $msg = trans('wallets.send.success');
        return response()->json(['success' => 'ok', 'message' => $msg, 'sender' => $request->input('address')]);
        /*
        if ($err === '2'){
            return $this->respondError(trans('wallets.error.create'));
        }

        return $this->respondCreated(trans('wallets.create.success'), 'wallet');
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function respondCreated($message, $link)
    {
        flash($message);
        return redirect($link);
    }

    protected function respondError($message)
    {
        flash()->error($message);
        return back()->withInput();
    }
}
