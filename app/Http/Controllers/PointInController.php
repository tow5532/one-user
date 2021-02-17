<?php

namespace App\Http\Controllers;

use App\Coinquote;
use App\Cointype;
use App\Deposit;
use App\DepositStep;
use App\Rules\EthAddr;
use App\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PointInController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $deposits = Deposit::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('points.in.index', compact('deposits'));
    }

    public function create()
    {
        return view('points.in.create');
    }

    public function data(Request $request)
    {
        $category_id = $request->input('category_id');

        //회사지갑주소
        $cointype = Cointype::findOrFail($category_id);
        $com_wallet = $cointype->wallet;

        //해당카테고리시세
        $coinquote = Coinquote::where('category_id', $category_id)->first();
        $quote = $coinquote->amount;

        //해당카테고리회원지갑주소
        $wallet = Wallet::where('user_id', Auth::user()->id)
            ->where('category_id', $category_id)
            ->where('use_yn', 'Y')
            ->first();

        if (! $wallet){
            return response()->json([
                'result' => 'empty',
            ], 200);
        }

        //json 생성
        return response()->json([
            'result' => 'ok',
            'com_wallet' => $com_wallet,
            'quote' => $quote,
            'my_wallet' => $wallet->addr,
        ], 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'holder'     => 'required',
            'amount'        => 'required',
        ]);

        //회원아이디
        $userId = Auth::user()->id;
        Deposit::create([
            'user_id' =>  $userId,
            'amount' => $request->input('amount'),
            'holder' => $request->input('holder'),
            'header_info' => $request->header('User-Agent'),
            'ip' => $request->ip(),
        ]);

        $msg = trans('point.in.in_success');
        return response()->json(['success' => 'ok', 'message' => $msg]);
    }

    public function history()
    {
        $userId = Auth::user()->id;

        //입금내역조회
        $deposits = DB::table('deposits')
            ->join('cointypes', 'deposits.category_id', '=', 'cointypes.id')
            ->join('deposit_step_category', 'deposits.step_id', '=', 'deposit_step_category.id')
            ->where('user_id', '=', $userId)
            ->select('deposits.*', 'cointypes.name', 'deposit_step_category.code')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('points.in.history', compact('deposits'));
    }

    public function deleteDeposit(Request $request)
    {
        $this->validate($request, [
            'id'     => 'required',
        ]);

        $step_cancel_jd = DepositStep::where('code', 'cancel')->first();

        $deposit = Deposit::find($request->input('id'));
        $deposit->step_id = $step_cancel_jd->id;
        $deposit->save();

        $msg = trans('point.history.complete_del');
        return response()->json(['success' => 'ok', 'message' => $msg]);
    }
}
