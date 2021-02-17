<?php
/**
 * Created by PhpStorm.
 * User: YONGMAN LEE
 * Date: 2020-07-19
 * Time: 오후 10:04
 */

namespace App\Http\Controllers;

use App\Deposit;
use App\User;
use http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Refund;
use App\HistoryDeleteLog;
use App\Point;

class HistoryController extends Controller
{
    public function __construct()
    {

    }
    public function index()
    {

//        $tableData = UserCsBoard::where(['username'=>Auth::user()->username,'delete'=>0])->orderBy('usercsidx','desc')->paginate(30);

        $deposit = Deposit::where(['user_id'=>Auth::user()->id, 'delete'=>0])->leftJoin('deposits_step_category', 'deposits.step_id', '=' ,'deposits_step_category.id')
                    ->select('deposits.id', 'deposits.step_id','deposits_step_category.code', 'deposits.created_at', DB::raw("'deposits' as types"), 'amount');

        $tableData = Refund::where(['user_id'=>Auth::user()->id, 'delete'=>0])->leftJoin('refund_step_category', 'refund.step_id', '=' ,'refund_step_category.id')
            ->select('refund.id', 'refund.step_id','refund_step_category.code', 'refund.created_at', DB::raw("'withdrawals' as types"), 'amount')
            ->unionAll($deposit)
            ->orderBy('created_at', 'desc')
            ->paginate(30);


        return view('users.history.index',['tableData'=>$tableData]);
    }



    public function delete(Request $request, $type ,$id){

        try {
            switch($type){
                case 'deposits':
                    $historyData = Deposit::where(['user_id'=>Auth::user()->id,'id'=>$id, 'delete'=>0])->count();
                    break;
                case 'withdrawals':
                    $historyData = Refund::where(['user_id'=>Auth::user()->id,'id'=>$id, 'delete'=>0, 'step_id' => 1])->count();

                    break;
                default :
                    return redirect()->route('history')->withSuccess('error', 'Delete fail');
                    break;
            }




            if($historyData == 0) {
                return redirect()->route('history')->withSuccess('error', 'Delete fail');
            }

            $param = [
                'delete' => 1
            ];

            try {
                switch($type){
                    case 'deposits':
                        $historyData = Deposit::where(['user_id'=>Auth::user()->id,'id'=>$id])->update($param);

                        break;
                    case 'withdrawals':
                        $param['step_id'] = 3;
                        $historyData = Refund::where(['user_id'=>Auth::user()->id,'id'=>$id])->update($param);
                                Point::where(['user_id'=>Auth::user()->id,'refund_id'=>$id,'po_content'=>'withdraw'])->delete();
                        break;
                    default :
                        return redirect()->route('history')->withSuccess('error', 'Delete fail');
                        break;
                }

            } catch (Exception $e) {
                return redirect()->route('history')->withSuccess('error', 'Delete fail');
            }


        } catch (Exception $e) {

            return redirect()->route('history')->withSuccess('error','Delete fail');
        }


        return redirect()->route('history')->withSuccess('Delete Success');
    }


}
