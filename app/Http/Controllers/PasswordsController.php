<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;

class PasswordsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function getRemind()
    {
        return view('passwords.remind');
    }

    public function postRemind(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users'
        ]);

        $email = $request->get('email');
        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        /*Mail::send('emails.passwords.reset', compact('token'), function ($message) use ($email){
           $message->to($email);
           $message->subject(
             sprintf('[%s] 비밀번호를 초기화하세요.', config('app.name'))
           );
        });*/
        event(new \App\Events\PasswordRemindCreated($email, $token));

        //flash('비밀번호를 바꾸는 방법을 담은 이메일을 발송했습니다. 메일박스를 확인해 주세요.');
        //return redirect('/');
        return $this->respondSuccess(
            trans('auth.passwords.sent_reminder')
        );
    }

    public function getReset($token = null)
    {
        return view('passwords.reset', compact('token'));
    }

    public function postReset(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users',
            'password' => 'required|confirmed',
            'token' => 'required'
        ]);

        $token = $request->get('token');

        if (! DB::table('password_resets')->whereToken($token)->first()) {
            return $this->respondError(
                trans('auth.passwords.error_wrong_url')
            );
        }

        User::whereEmail($request->input('email'))->first()->update([
            'password' => bcrypt($request->input('password'))
        ]);

        DB::table('password_resets')->whereToken($token)->delete();

        return $this->respondSuccess(
            trans('auth.passwords.success_reset')
        );
    }

    protected function respondSuccess($message)
    {
        flash($message);
        return redirect('/');
    }
}
