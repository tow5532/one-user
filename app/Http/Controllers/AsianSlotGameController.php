<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsianSlotGameController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('games.asian.index');
    }

    public function view()
    {
        return view('games.asian.view');
    }
}
