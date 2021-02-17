<?php

namespace App\Http\Controllers;
/*
 *SLOT GAME INTEGRATION API (V1.10)
 * 슬롯 게임 코드
 *아리스토 슬롯      - aristo
 *씨큐나인 슬롯      - cq9
 *아리스토 슬롯      - aristo
 *프라그마틱 슬롯    - pragmatic
 *씨큐나인 슬롯      - cq9
 *FG 토탈 슬롯       - fgslot
 *QT 토탈 슬롯       - qtslot
 *
- 회원 아이디 생성
http://slot99n.com/createplayer.html

- 게임 아이디 생성
http://영상게임코드.slot99n.com/cp.html

- 게임 실행
http://영상게임코드.slot99n.com/go_slot.html
http://pragmatic.slot99n.com/go_slot.html?adminid=tow5532&playerid=greentest1&gametype=vs4096bufking

- 잔액 조회
http://영상게임코드.slot99n.com/bp.html

- 입금 처리
http://영상게임코드.slot99n.com/dp.html

--출금 처리
http://영상게임코드.slot99n.com/wp.html

-에이전트 게임기록 조회
http://영상게임코드.slot99n.com/gh_history.html

-플레이어 게임기록 조회
http://영상게임코드.slot99n.com/gh_player.html

-게임영상알 에이전트머니 조회
http://영상게임코드.slot99n.com/ag_money.html?adminid=관리자아이디

- 에이전트 게임기록 요약
http://pragmatic.slot99n.com/gh_summary.html?adminid=tow5532&typeid=agent&rdate=2017-05-02

2021-02-16 테스트 계정정보
회원아이디 : greentest1
게임 아이디

아리스토	665379
프라그마틱	greentest1PR445744
씨큐나인	greentest1CQ445744
FG슬롯	greentest1FG445744
QT슬롯	greentest1QT445744

 * */

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SlotApiController extends Controller
{

    public function __construct()
    {

    }

    //회원계정 생성
    public function createPlayer(Request $request)
    {
        //request validation
        /*try {
            $this->validate($request, [
                'playerid' => 'required',
                'playername' => 'required|min:6|max:20',
                'bankcd' => 'same:password',
                'banknum' => 'required',
                'bankname' => 'required',
            ]);
        } catch (ValidationException $e) {
        }*/

        //Send Client
        $url    = "http://slot99n.com/createplayer.html";
        $client = new Client();
        try {
            $response = $client->request('GET', $url, ['query' => [
                'adminid' => 'tow5532',
                'playerid' => 'greentest1',
                'playername' => '테스트2계정',
                'bankcd' => '테스트은행',
                'banknum' => '111-1111-1111',
                'bankname' => '홍길동',
            ]]);
            if ($response->getStatusCode() === 200) {
                $xml    = simplexml_load_string($response->getBody()->getContents());
                $json   = json_encode($xml);
                $array  = json_decode($json, true);
                dd($array);
            }

        } catch (GuzzleException $e) {
            echo Message::toString($e->getRequest());
        }
    }

    //게임 계정 생성
    public function createGameUser(Request $request)
    {
        //request validation
        /*try {
            $this->validate($request, [
                'playerid' => 'required',
                'playername' => 'required|min:6|max:20',
                'bankcd' => 'same:password',
                'banknum' => 'required',
                'bankname' => 'required',
            ]);
        } catch (ValidationException $e) {
        }*/

        $game = 'pragmatic';

        $url    = "http://".$game.".slot99n.com/cp.html";
        $client = new Client();
        try {
            $response = $client->request('GET', $url, ['query' => [
                'adminid' => 'tow5532',
                'playerid' => 'greentest1',
            ]]);
            if ($response->getStatusCode() === 200) {
                $xml    = simplexml_load_string($response->getBody()->getContents());
                $json   = json_encode($xml);
                $array  = json_decode($json, true);
                dd($array);
            }
        } catch (GuzzleException $e) {
            echo Message::toString($e->getRequest());
        }
    }

    //잔액조회
    function checkHaveGameMoney(Request $request)
    {
        $url    = "http://pragmatic.slot99n.com/bp.html";
        $client = new Client();

        try {
            $response = $client->request('GET', $url, ['query' => [
                'adminid' => 'tow5532',
                'playerid' => 'greentest1',
            ]]);
            if ($response->getStatusCode() === 200) {
                $xml    = simplexml_load_string($response->getBody()->getContents());
                $json   = json_encode($xml);
                $array  = json_decode($json, true);
                dd($array);
            }
        } catch (GuzzleException $e) {
            echo Message::toString($e->getRequest());
        }
    }

    //게임머니 입금 처리
    public function depositCreate(Request $request)
    {
        $url    = "http://pragmatic.slot99n.com/dp.html";
        $client = new Client();

        try {
            $response = $client->request('GET', $url, ['query' => [
                'adminid' => 'tow5532',
                'playerid' => 'greentest1',
                'amount' => 10000,
            ]]);
            if ($response->getStatusCode() === 200) {
                $xml    = simplexml_load_string($response->getBody()->getContents());
                $json   = json_encode($xml);
                $array  = json_decode($json, true);
                dd($array);
            }
        } catch (GuzzleException $e) {
            echo Message::toString($e->getRequest());
        }
    }

    //게임머니 출금 처리
    public function withdrawCreate(Request $request)
    {
        $url    = "http://pragmatic.slot99n.com/wp.html";
        $client = new Client();

        try {
            $response = $client->request('GET', $url, ['query' => [
                'adminid' => 'tow5532',
                'playerid' => 'greentest1',
                'amount' => 10000,
            ]]);
            if ($response->getStatusCode() === 200) {
                $xml    = simplexml_load_string($response->getBody()->getContents());
                $json   = json_encode($xml);
                $array  = json_decode($json, true);
                dd($array);
            }
        } catch (GuzzleException $e) {
            echo Message::toString($e->getRequest());
        }
    }

    //에이전트 게임기록 조회
    public function agentGameHistory()
    {
        $url    = "http://pragmatic.slot99n.com/gh_history.html";
        $client = new Client();

        try {
            $response = $client->request('GET', $url, ['query' => [
                'adminid' => 'tow5532',
            ]]);
            if ($response->getStatusCode() === 200) {
                $xml    = simplexml_load_string($response->getBody()->getContents());
                $json   = json_encode($xml);
                $array  = json_decode($json, true);
                dd($array);
            }
        } catch (GuzzleException $e) {
            echo Message::toString($e->getRequest());
        }
    }

    //회원 게임 기록 조회 (웹페이지 html 형태로 출력된다.)
    public function userGameHistory()
    {
        $url    = "http://pragmatic.slot99n.com/gh_player.html";
        $client = new Client();

        try {
            $response = $client->request('GET', $url, ['query' => [
                'adminid' => 'tow5532',
                'playerid' => 'greentest1',
                'rdate' => '2021-02-17',
            ]]);
            if ($response->getStatusCode() === 200) {
                echo $response->getBody()->getContents();
                exit;
            }
        } catch (GuzzleException $e) {
            echo Message::toString($e->getRequest());
        }
    }

    //에이전트 남은 알 수량 조회
    public function agentEggcount()
    {
        $url    = "http://pragmatic.slot99n.com/ag_money.html";
        $client = new Client();

        try {
            $response = $client->request('GET', $url, ['query' => [
                'adminid' => 'tow5532',
            ]]);
            if ($response->getStatusCode() === 200) {
                $xml    = simplexml_load_string($response->getBody()->getContents());
                $json   = json_encode($xml);
                $array  = json_decode($json, true);
                dd($array);
            }
        } catch (GuzzleException $e) {
            echo Message::toString($e->getRequest());
        }
    }

    //에이전트 게임기록 요약
    public function agentGameSummary()
    {
        $url    = "http://pragmatic.slot99n.com/gh_summary.html";
        $client = new Client();

        try {
            $response = $client->request('GET', $url, ['query' => [
                'adminid' => 'tow5532',
                'rdate' => '2021-02-17',
                'typeid' => 'player',
            ]]);
            if ($response->getStatusCode() === 200) {
                $xml    = simplexml_load_string($response->getBody()->getContents());
                $json   = json_encode($xml);
                $array  = json_decode($json, true);
                dd($array);
            }
        } catch (GuzzleException $e) {
            echo Message::toString($e->getRequest());
        }
    }
}
