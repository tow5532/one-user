<?php

namespace App\Http\Controllers;

use App\SlotGameAuth;
use App\SlotGameMoneyIn;
use App\SlotGameMoneyOut;
use App\SlotGameUserLog;
use App\TSafer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Amountdata;
use App\HistoryDeleteLog;
use App\BankAccount;
use App\Deposit;
use App\DepositMin;
use App\Point;
use App\GameInfo;
use App\GameSafeMoney;
use App\GameSafeMoneyLog;

class ExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //회원 포인트 조회
        $userOrigPoint = Point::where(['user_id' => Auth::user()->id, 'use_point' => '0'])->orderBy('id', 'desc')->sum('point');
        $userUsePoint = Point::where(['user_id' => Auth::user()->id, 'point' => '0'])->orderBy('id', 'desc')->sum('use_point');
        $userPoint = $userOrigPoint - $userUsePoint;

        //게임 정보
        $gameInfo = GameInfo::where(['name' => 'slot'])->latest()->first();

        //게임 회원정보
        $playerData = SlotGameAuth::where('Aid', Auth::user()->account_id)->first();

        //포인트 -> 게임머니 입금 테이블 조회
        $slotGameMoneyIn = SlotGameMoneyIn::where('Aid', Auth::user()->account_id)->where('flag', '0')->sum('Val1');

        //게임머니조회
        if ($playerData){
            $gamePoint = $playerData->Chip;
            //게임머니 -> 포인트 이동 테이블 조회
            $safe_money = SlotGameMoneyOut::where(['Aid' => $playerData->Aid, 'flag' => '0'])->sum('SaveMoney');
        } else {
            $gamePoint = 0;
            $safe_money = 0;
        }

        $userSafePoint = 0;

        return view('exchange.renew')->with([
            'userPoint' => $userPoint + $slotGameMoneyIn,
            'gameInfo' => $gameInfo,
            'gamePoint' => $gamePoint + $safe_money,
            'userSafePoint' => $userSafePoint
        ]);
    }


    public function index_back()
    {


        $userOrigPoint = Point::where(['user_id' => Auth::user()->id,'use_point' => '0'])->orderBy('id','desc')->sum('point');
        $userUsePoint = Point::where(['user_id' => Auth::user()->id,'point' => '0'])->orderBy('id','desc')->sum('use_point');


		$userPoint = $userOrigPoint - $userUsePoint;

        $gameInfo = GameInfo::where(['name'=>'holdem'])->latest()->first();
        $playerData = DB::connection('mssql')->table('Account')->where('AccountID', Auth::user()->username)->select('AccountIdx')->first();

        if($playerData) {
            $game_player = DB::connection('mssql')->table('Player')->where('AccountUniqueid', $playerData->AccountIdx)->select('PlayerName', 'Have_Money')->first();
        }else{
            $game_player = '';
        }

        $game_safe_money = GameSafeMoney::where(['user_id' => Auth::user()->id])->select('safe_money')->first();

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



            } else{
                $userSafePoint= ($game_safe_money)?$game_safe_money->safe_money:0;
            }


            //game_safe_money -> 포인트로 이동
            if($userSafePoint > 0){
                $userOrigPoint = Point::where(['user_id' => Auth::user()->id,'use_point' => '0'])->orderBy('id','desc')->sum('point');
                $userUsePoint = Point::where(['user_id' => Auth::user()->id,'point' => '0'])->orderBy('id','desc')->sum('use_point');
                $userPoint = $userOrigPoint - $userUsePoint;

                //$userSafePointUpdate = GameSafeMoney::where('user_id',Auth::user()->id)->update($param);

                $gameid = DB::connection('mssql')->table('Account')->where('AccountID', Auth::user()->username)->value('AccountIDx');

                $pointData = Point::create([
                    'user_id' => Auth::user()->id,
                    'po_content' => 'send_web',
                    'point' => $userSafePoint / $gameInfo->outquote,
                    'use_point' => 0,
                    'mb_point' => $userPoint,
                    'game_id' => $gameid
                ]);

                $safePointUpdate = GameSafeMoney::where(['user_id'=>Auth::user()->id])->update(['safe_money'=>'0','updated_at' => date('Y-m-d H:i:s')]);

                $userOrigPoint = Point::where(['user_id' => Auth::user()->id,'use_point' => '0'])->orderBy('id','desc')->sum('point');
                $userUsePoint = Point::where(['user_id' => Auth::user()->id,'point' => '0'])->orderBy('id','desc')->sum('use_point');


                $userPoint = $userOrigPoint - $userUsePoint;



            }


            $GameCommandMoney = DB::connection('mssql')->table('t_Command')->where(['AccountUniqueID'=> $playerData->AccountIdx])->sum('val1');

        } else{
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

        return view('exchange.renew')->with([
            'userPoint' => $userPoint,
            'gameInfo' => $gameInfo,
            'gamePoint' => $gamePoint + $GameCommandMoney,
            'userSafePoint' => $userSafePoint
        ]);
    }

    public function sendGameCreate(Request $request)
    {
        //

        $request->merge(['amounts' => str_replace(',','',$request->get('sg_amounts'))]);


        $this->validate($request, [
            'amounts'=> 'required',
        ]);

        $gameInfo = GameInfo::where(['name'=>'slot'])->latest()->first();

        $userOrigPoint = Point::where(['user_id' => Auth::user()->id,'use_point' => '0'])->orderBy('id','desc')->sum('point');
        $userUsePoint = Point::where(['user_id' => Auth::user()->id,'point' => '0'])->orderBy('id','desc')->sum('use_point');


		$userPoint = $userOrigPoint - $userUsePoint;


        if($request->get('amounts') > $userPoint){
            return response()->json(['errors'=>['amounts' => [trans('wallets.exchange.sendGameErr.amounts')]], 'result' => 0] );
            //return redirect()->back()->withInput()->withErrors(array('amounts'=>'The minimum deposits is '.$depoit_min.'.'));
        }

        //$playerData = DB::connection('mssql')->table('Account')->where('AccountID', Auth::user()->username)->select('AccountIdx')->first();
        $playerData = SlotGameAuth::where('Aid', Auth::user()->account_id)->select('Aid')->first();

        if($playerData) {
			/*$pointInsert = DB::connection('mssql')->table('t_Command')->insert([
				'AccountUniqueid' => $playerData->AccountIdx,
				'command' => 'money change',
				'val1' => $request->get('amounts') * $gameInfo->inquote
			]);*/
			$pointInsert = SlotGameMoneyIn::create([
                'Aid' => $playerData->Aid,
                'Command' => 'money change',
                'Val1' => $request->get('amounts') * $gameInfo->inquote,
                'Comment' => 'transfer',
                'flag' => '0',
            ]);

        }else{
           return response()->json(['errors'=>['amounts' => [trans('wallets.exchange.sendGameErr.notFoundUser')]], 'result' => 0]);
        }

        //if(!$game_player){
        //    return response()->json(['errors'=>['amounts' => [trans('wallets.exchange.sendGameErr.notFoundUser')]], 'result' => 0]);
        //}
        //$haveMoney = $game_player->Have_Money +  $request->get('amounts') * $gameInfo->chip_rate.'00000000';

        //$userMsSql= DB::connection('mssql')->table('Player')->where(['AccountUniqueid' => $playerData->AccountIdx])->update(['Have_Money' => $haveMoney,'update'=>date('Y-m-d H:i:s.v')]);


        $pointData = Point::create([
            'user_id' => Auth::user()->id,
            'po_content' => 'send_game',
            'point' => 0,
            'use_point' => $request->get('amounts'),
            'mb_point' => $userPoint,
            'game_id' => 1
        ]);

        $success = array(
            'msg' => trans('wallets.exchange.sendGameSuccess')
        , 'result' => 1
        );

        return response()->json($success);
    }

    public function sendDepositCreate(Request $request)
    {
        //
        $request->merge(['amounts' => str_replace(',','',$request->get('sd_texas_holdem'))]);


        $this->validate($request, [
            'amounts'=> 'required',
        ]);

        if($request->get('amounts') % 1000 != 0){

            return response()->json(['errors'=>['amounts' => [trans('wallets.exchange.sendDepositErr.units')]], 'result' => 0]);
        }


        $gameInfo = GameInfo::where(['name'=>'holdem'])->latest()->first();

       $userOrigPoint = Point::where(['user_id' => Auth::user()->id,'use_point' => '0'])->orderBy('id','desc')->sum('point');
        $userUsePoint = Point::where(['user_id' => Auth::user()->id,'point' => '0'])->orderBy('id','desc')->sum('use_point');


		$userPoint = $userOrigPoint - $userUsePoint;




        if($gameInfo->min_amount > $request->get('amounts')){
            return response()->json(['errors'=>['amounts' => [trans('wallets.exchange.sendDepositErr.minimum',['min'=>$gameInfo->min_amount])]], 'result' => 0]);
        }
        $player = DB::connection('mssql')->table('Player')->where('AccountUniqueid', Auth::user()->id)->select('PlayerName', 'Have_Money')->first();

        if(!$player){
            $gamePlayerName = '';
            $gamePoint = '';
        }else{
            $gamePlayerName = $player->PlayerName;
            $gamePoint = substr($player->Have_money, 0,-8);
        }

        $playerData = DB::connection('mssql')->table('Account')->where('AccountID', Auth::user()->username)->select('AccountIdx')->first();

        $game_safe_money = GameSafeMoney::where(['user_id' => Auth::user()->id])->select('safe_money')->first();
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

            $GameCommandMoney = DB::connection('mssql')->table('t_Command')->where(['AccountUniqueID'=> $playerData->AccountIdx])->sum('val1');




        }else{
            $userSafePoint= 0;
        }



//      보유 게임포인트
        if($request->get('amounts') > $userSafePoint){
            return response()->json(['errors'=>['amounts' => [trans('wallets.exchange.sendDepositErr.amounts')]], 'result' => 0] );
            //return redirect()->back()->withInput()->withErrors(array('amounts'=>'The minimum deposits is '.$depoit_min.'.'));
        }

        $gameid = DB::connection('mssql')->table('Account')->where('AccountID', Auth::user()->username)->value('AccountIDx');

        if(!$gameid){
            return response()->json(['errors'=>['amounts' => [trans('wallets.exchange.sendDepositErr.notFound')]], 'result' => 0]);
        }


        $param = [
            'safe_money' => $userSafePoint - $request->get('amounts')
        ];

        $userSafePointUpdate = GameSafeMoney::where('user_id',Auth::user()->id)->update($param);

        $pointData = Point::create([
            'user_id' => Auth::user()->id,
            'po_content' => 'send_web',
            'point' => $request->get('amounts') / $gameInfo->outquote,
            'use_point' => 0,
            'mb_point' => $userPoint,
            'game_id' => $gameid
        ]);


        $success = array(
            'msg' => trans('wallets.exchange.sendDepositSuccess')
        , 'result' => 1
        );

        return response()->json($success);
    }

    public function refresh(){

        //해당 회원 포인트 조회
        $userOrigPoint  = Point::where(['user_id' => Auth::user()->id,'use_point' => '0'])->orderBy('id','desc')->sum('point');
        $userUsePoint   = Point::where(['user_id' => Auth::user()->id,'point' => '0'])->orderBy('id','desc')->sum('use_point');
        $userPoint      = $userOrigPoint - $userUsePoint;

        //게임머니 조회
        //$playerData = DB::connection('mssql')->table('Account')->where('AccountID', Auth::user()->username)->select('AccountIdx')->first();
        $playerData = SlotGameAuth::where('Aid', Auth::user()->account_id)->select('Aid')->first();

        if($playerData) {
            $game_player = DB::connection('mssql')->table('Player')->where('AccountUniqueid', $playerData->Aid)->select('PlayerName', 'Have_Money')->first();
        }else{
            $game_player = '';
        }

        if(!$game_player){
            $gamePoint = 0;
        }else{
            $gamePoint = substr($game_player->Have_Money, 0,-8);
        }


        $playerData = DB::connection('mssql')->table('Account')->where('AccountID', Auth::user()->username)->select('AccountIdx')->first();
        $game_safe_money = GameSafeMoney::where(['user_id' => Auth::user()->id])->select('safe_money')->first();

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

            $GameCommandMoney = DB::connection('mssql')->table('t_Command')->where(['AccountUniqueID'=> $playerData->AccountIdx])->sum('val1');

        }else{
            $userSafePoint= 0;
        }

        if($gamePoint == false){
            $gamePoint = 0;
        }


        return json_encode(['userDeposit' => $userPoint, 'gamePoint' => $gamePoint + $GameCommandMoney,'gameSafePoint' => $userSafePoint]);
    }
}
