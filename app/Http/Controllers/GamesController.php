<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('games.index');
    }

    public function getDownload()
    {
//        if ($id === 'holdem'){
//            return Storage::download('tobigca.apk');
//        }
        return view('games.download');
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
        //
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

    public function androidDownload(){
        //return Storage::download('sunholdem.apk', 'sunholdem.apk', ['Content-Type'=>'application/vnd.android.package-archive']);
        //return Redirect::away('https://sunporker-bucket.s3.ap-east-1.amazonaws.com/sunholdem.apk');
    }

    public function pcDownload(){
        $mobile_agent = '/(iPod|iPhone|Android|BlackBerry|SymbianOS|SCH-M\d+|Opera Mini|Windows CE|Nokia|SonyEricsson|webOS|PalmOS)/';

        if (preg_match($mobile_agent, $_SERVER['HTTP_USER_AGENT'])) {

            //return redirect()->back()->with('alert',trans('download.pc_chk'));
           // return Redirect::away('https://sunporker-bucket.s3.ap-east-1.amazonaws.com/SunHoldemSetup.exe');
        }

        //return redirect()->back();
        return Storage::download('SunHoldemSetup.exe');
    }

    public function slotDownload()
    {
        $ip     = request()->server('SERVER_ADDR');
        $link   = ($ip === '192.168.1.23') ? '/test/LuckyMonacoSetup.exe' : '/live/LuckyMonacoSetup.exe';

        return Storage::download($link);
    }

}
