<?php
/**
 * Created by PhpStorm.
 * User: YONGMAN LEE
 * Date: 2020-07-19
 * Time: 오후 10:04
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\UserCsBoard;

class HelpController extends Controller
{
    public function index()
    {
        $tableData = UserCsBoard::where(['username'=>Auth::user()->username,'delete'=>0])->orderBy('usercsidx','desc')->paginate(30);
        return view('users.help.index',['tableData'=>$tableData]);
    }

    public function insertView()
    {
        return view('users.help.insert');
    }

    public function insert(Request $request)
    {
        $this->validate($request, [
            'title'=> 'required|max:50',
            'comment'=> 'required',
        ]);

        try {
            $DATA = UserCsBoard::create([
                'username' => Auth::user()->username,
                'title' => $request->input('title'),
                'contents' => $request->input('comment'),
                'regdate' => date('Y-m-d H:i:s'),
                'updatedate' => date('Y-m-d H:i:s'),
                'delete' => 0,
            ]);
            sendTelegramMsgHelpDesk(Auth::user()->id, $request->input('title'));

        } catch (Exception $e) {

            return redirect()->back()->with('error','Sending fail');
        }


        return redirect()->route('help')->withSuccess('Send Success');
    }


    public function delete(Request $request, $id){
        $usercsidx = $id;
        $param = [
            'delete'=>1
        ];
        try {
            $userData = UserCsBoard::where(['username'=>Auth::user()->username, 'usercsidx'=>$usercsidx])->update($param);

        } catch (Exception $e) {

            return redirect()->route('help')->withSuccess('error','Delete fail');
        }


        return redirect()->route('help')->withSuccess('Delete Success');
    }

    public function faq(){
        return view('users.help.faq');
    }
}
