<?php

namespace App\Http\Controllers;

use App\SlotGameAuth;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;

class SlotGameController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('games.slot');
    }

    public function start()
    {
        if (Auth::user()->id === null){
            return response()->json(array('success' => false, 'err_msg' => 'need login'));
        }

        $user       = User::find(Auth::user()->id);
        //$session_id = md5(rand(1, 10) . microtime()) ;
        $session_id = Str::random(80) . '' .  Auth::user()->id;


        //게임DB에 해당 회원 계정이 없으면 게임DB 에 등록
        if ($user->account_id === null){
            //임시 해당 테이블 마지막 아이디 조회
            $result_id = SlotGameAuth::insertGetId([
                'CertificationKey' => $session_id,
                'UpdateDate' => Carbon::now(),
            ]);

            $user->account_id = $result_id;
            $user->save();
        }

        //게임DB에 세션 키 업데이트
        $updated = SlotGameAuth::where('Aid', $user->account_id)->update([
            'CertificationKey' => $session_id,
            'UpdateDate' => Carbon::now(),
        ]);

        //해당 회원테이블에도 업데이트
        User::where('id', Auth::user()->id)->update([
            'game_token' => $session_id,
            'game_auth_update' => Carbon::now(),
        ]);

        $agent = new Agent();

        if ($agent->isMobile() && $agent->isAndroidOS()){
            $isMobile = true;
            $link_url = 'intent://luckymonaco?arg=A100'. $session_id .'#Intent;scheme=superfts;package=com.superfts.luckymonaco;end';
        } else {
            $isMobile = false;
            $link_url = 'psgs://psgsslot/A100' . $session_id;
        }


        return response()->json(array('success' => true, 'certification_link' => $link_url, 'isMobile' => $isMobile));
    }
}
