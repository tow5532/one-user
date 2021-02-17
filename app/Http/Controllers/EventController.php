<?php
/**
 * Created by PhpStorm.
 * User: YONGMAN LEE
 * Date: 2020-07-17
 * Time: 오후 11:13
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Resources;

class EventController extends Controller
{
    public function index(){
		$tableData = Resources::where(['category'=>'event'])->orderBy('id','desc')->paginate(1);
        return view('events.index',['tableData'=>$tableData]);
    }
}