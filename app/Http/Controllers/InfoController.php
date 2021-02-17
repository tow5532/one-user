<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function __construct()
    {

    }
    public function faq()
    {
        return view('info.faq');
    }

    public function menual()
    {
        return view('info.menual');
    }

    public function contactus()
    {
        return view('info.contactus');
    }
}
