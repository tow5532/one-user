<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Encore\Admin\Middleware\Session;
class MainController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('main');
    }

    public function locale()
    {
        $cookie = cookie()->forever('locale__myapp', request('locale'));
        cookie()->queue($cookie);
        return ($return = request('return'))
            ? redirect(urldecode($return))->withCookie($cookie)
            : redirect('/')->withCookie($cookie);
    }
}
