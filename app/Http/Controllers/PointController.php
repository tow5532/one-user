<?php

namespace App\Http\Controllers;

use App\Cointype;
use App\User;
use App\Wallet;
use Illuminate\Http\Request;
use App\Rules\EthAddr;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PointController extends Controller
{
    public function __construct()
    {
        //$this->middleware('comming');
        //$this->middleware('checkcomeip');
        $this->middleware('auth');
    }

    public function index()
    {

        //코인별지갑정보조회
        $userId = Auth::user()->id;
        $wallets = DB::table('wallets')
            ->join('cointypes', 'wallets.category_id', '=', 'cointypes.id')
            ->where('user_id', '=', $userId)
            ->where('use_yn', 'Y')
            ->select('wallets.*', 'cointypes.name')
            ->get();
        return view('points.index', compact('wallets'));
    }

    public function wallet()
    {
        //코인별지갑정보조회
        $userId = Auth::user()->id;
        $wallets = DB::table('wallets')
            ->join('cointypes', 'wallets.category_id', '=', 'cointypes.id')
            ->where('user_id', '=', $userId)
            ->where('use_yn', 'Y')
            ->select('wallets.*', 'cointypes.name')
            ->get();
        return view('points.index', compact('wallets'));
    }

    public function create()
    {
        //코인별지갑정보조회
        $userId = Auth::user()->id;
        $wallets = DB::table('wallets')
            ->join('cointypes', 'wallets.category_id', '=', 'cointypes.id')
            ->where('user_id', '=', $userId)
            ->where('use_yn', 'Y')
            ->select('wallets.*', 'cointypes.name')
            ->get();

        //가상화폐 카테고리 조회
        $cointypes = Cointype::all()->sortBy('orderby');

        return view('points.create', compact('cointypes'), compact('wallets'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'coin_category'=> 'required',
            'address' => ['required', new EthAddr],
        ]);

        //회원아이디
        $userId = Auth::user()->id;

        //기존에 해당 코인카테고리지갑주소가 등록되어있는지 확인
        $result = Wallet::where('user_id' , $userId)
            ->where('category_id' , $request->input('coin_category'))
            ->where('use_yn', 'Y')
            ->count();


        if ($result > 0){
            return $this->respondError();
        }

        //지갑등록
        Wallet::create([
            'user_id' =>  $userId,
            'addr' => $request->input('address'),
            'category_id' => $request->input('coin_category'),
        ]);

        return $this->respondCreated();
    }

    public function destroy(Request $request)
    {
        $this->validate($request, [
            'id'=> 'required',
        ]);

        Wallet::where('id', $request->input('id'))->update(['use_yn'=> 'N']);

        return response()->json(['success' => 'ok', 'message' => trans('point.create.del_success')]);
    }

    protected function respondCreated()
    {
        flash()->success(
            trans('point.create.success_created')
        );
        return redirect(route('point.create'));
    }

    protected function respondError()
    {
        flash()->error(
            trans('point.create.same_error')
        );
        //return redirect(route('point.create'));
        return Redirect::back();
    }
}
