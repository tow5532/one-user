<?php

namespace App\Http\Controllers;

use App\Point;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PlaygroundController extends Controller
{
    public function index()
    {

        return view('playgrounds.games.index');
    }

    public function game($category)
    {
        if ($category === 'casual'){
            return view('playgrounds.games.casual.index');
        }

        return view('playgrounds.games.table.index');
    }

    public function charge($id)
    {
        //회원 IN 조회
        $user_id = Auth::user()->id;

        $in_amount  = Point::where('user_id', $user_id)->sum('point');
        $out_amount = Point::where('user_id', $user_id)->sum('use_point');
        $result     = $in_amount - $out_amount;

        return view('playgrounds.games.table.charge', compact('result'), compact('id'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'in_cnt' => 'required',
            'amount' => 'required',
            'chip_cnt' => 'required',
        ]);

        //회원 IN 조회
        $user_id = Auth::user()->id;
        $user_email = Auth::user()->email;

        //다시한번 회원 IN 포인트 수량 확인
        $in_amount  = Point::where('user_id', $user_id)->sum('point');
        $out_amount = Point::where('user_id', $user_id)->sum('use_point');
        $sum_in     = $in_amount - $out_amount;
        $sum_in     = (int) $sum_in;

        if ($sum_in !== (int) $request->input('in_cnt')){
            $msg = trans('games.charge.in_error');
            return response()->json(['success' => 'no', 'message' => $msg]);
        }

        $result_in = (int)$request->input('in_cnt') - (int)$request->input('amount');

        //차감등록
        Point::create([
            'user_id'       => $user_id,
            'po_content'    => 'holdem',
            'point'         => '0',
            'use_point'     => $request->input('amount'),
            'mb_point'      => $result_in,
        ]);

        //게임DB 회원 번호조회
        $gameAcount = DB::connection('mssql')
            ->table('Account')
            ->where('AccountID', $user_email)->first();

        //게임DB에 칩수량 등록
        DB::connection('mssql')->table('t_Command')->insert([
            'AccountUniqueid' => $gameAcount->AccountIDx,
            'command' => 'money change',
            'val1' => $request->input('chip_cnt'),
        ]);

        $msg = trans('games.charge.complete');
        return response()->json(['success' => 'ok', 'message' => $msg]);
    }


    public function webtoon()
    {
        return view('playgrounds.webtoon.index');
    }

    public function getDownload($id)
    {
        if ($id === 'holdem'){
            return Storage::download('abc.apk');
        }
    }
}
