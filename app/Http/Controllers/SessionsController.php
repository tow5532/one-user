<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            //'email' => 'required|email',
            'username'=> 'required|alpha_num',
            'password' => 'required|min:6',
            //'g-recaptcha-response' => 'required|captcha',
        ]);

        //db 에 등록된 암호 조회
        $user = User::where(['username'=> $request->username, 'admin_yn' => 'N'])->first();


        if (is_null($user)){
            flash()->error(
                trans('auth.sessions.error_incorrect_credentials')
            );
            return redirect('auth/login');
        }

        if($user->bank == null || $user->withdrawal_password == null){
            $stepRequest = array(
                'id' => $user->username,
                'key' => md5(uniqid(rand(), true)),
                'stepKey' => Crypt::encryptString($request->input('password'))
            );

            if($user->bank == null){

                //Step2로 request 이동
                return redirect()->route('users.bank')->with('stepParams',$stepRequest);
            }
            if($user->withdrawal_password == null){

                return redirect()->route('users.pincode')->with('stepParams',$stepRequest);
            }
            exit;
        }

        if (!auth()->attempt($request->only('username', 'password'), $request->has('remember'))) {
            return $this->respondError(trans('auth.sessions.error_incorrect_credentials'));
        }

        //멀티 로그인 방지
        $password = $request->password;
        Auth::logoutOtherDevices($password);

        return redirect()->intended('/');
    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/');
    }

    /**
     * Make an error response.
     *
     * @param string $message
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function respondError($message)
    {
        flash()->error($message);
        return back()->withInput();
    }
}
