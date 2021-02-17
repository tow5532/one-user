<?php

namespace App\Http\Controllers;


use App\DailyinfoCompany;
use App\DailyinfoMaster;
use App\Deposit;
use App\DepositStep;
use App\GameInfo;
use App\GameMember;
use App\GameSafeMoney;
use App\GameTourRegist;
use App\Headquarter;
use App\HeadquarterDeposit;
use App\HeadquarterLog;
use App\HouseEdge;
use App\LogMoney;
use App\Point;
use App\Refund;
use App\RefundStep;
use App\Tcommand;
use App\TSafer;
use App\User;
use Carbon\Carbon;
use Encore\Admin\Form\Concerns\HasHooks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DailyCalculateController extends Controller
{
    public $yesterdayDate;
    public $todayDate;
    public $normal_master_per;
    public $normal_company_per;
    public $normal_jackpot_per;
    public $sit_master_per;
    public $sit_company_per;
    public $tour_master_per;
    public $tour_company_per;
    public $user_table;
    public $company_id;
    public $company_fee;
    public $inQuote;
    public $outQuote;
    public $saleFee;

    public function __construct()
    {
        $yesterday              = Carbon::yesterday();
        //$yesterday              = Carbon::parse('2020-12-09');
        $this->yesterdayDate    = $yesterday->toDateString();

        $today                  = Carbon::today();
        $this->todayDate        = $today->toDateString();

        //$this->normal_master_per    = 43.75;
        //$this->normal_company_per   = 43.75;
        //$this->normal_company_per   = 100;
        //$this->normal_jackpot_per   = 12.5;

        $this->normal_master_per    = 38;
        $this->normal_company_per   = 60;
        $this->normal_jackpot_per   = 2;

        //$this->sit_master_per       = 50;
        //$this->sit_company_per      = 100;
        $this->sit_master_per       = 40;
        $this->sit_company_per      = 60;

        //$this->tour_master_per      = 50;
        //$this->tour_company_per     = 100;
        $this->tour_master_per      = 40;
        $this->tour_company_per     = 60;

        $this->saleFee  = 0.23;

        $this->user_table = config('admin.database.users_table');

        //본사 계정 조회
        $compay = DB::table('users')
            ->join('admin_role_users', 'users.id', '=', 'admin_role_users.user_id')
            ->join('admin_roles', 'admin_role_users.role_id', '=', 'admin_roles.id')
            ->where('admin_roles.slug', '=', 'company')
            ->select('users.*')
            ->get();
        foreach ($compay as $member) {
            $this->company_id =  $member->id;
            $this->company_fee = $member->profit;
        }

        //게임머니 <-> 포인트 변활 비율
        $game_info  = GameInfo::where('code', 'holdem')->first();
        $this->inQuote    = (int)$game_info->inquote;
        $this->outQuote   = (int)$game_info->outquote;

    }

    public function index()
    {
        Log::channel('calcul_master')->info('check Date : '. $this->yesterdayDate);

        //마스터 정산 현황 시작
        //입금대기
        $heads = Headquarter::where('full_ok', '0')->get();
        $sum_amount = 0;
        foreach ($heads as $head){
            $deposits = HeadquarterDeposit::where('head_id', '=', $head->id)->sum('deposit_point');
            $sum_amount += (int)$deposits;
        }
        if ($sum_amount > 0){
            $minus_amount = -$sum_amount;
            $minus_amount = $minus_amount * 10;
        } else {
            $minus_amount = 0;
        }
        echo '입금대기 : ' . $minus_amount . ' | ';


        //어제날짜 입금 총합
        $headDeposits = HeadquarterDeposit::whereDate('created_at', '=', $this->yesterdayDate)
            ->select(DB::raw('sum(deposit_point) as total_amount'), DB::raw('head_id'))
            ->groupBy('head_id')->get();

        $deposit_amount = 0;
        foreach ($headDeposits as $headDeposit) {
            //건의 수량
            $deposit_amount += $headDeposit->total_amount;
            //echo '입금건 아이디 : ' . $headDeposit->head_id. ' | ';
            //echo '해당날짜에 입금한 금액은 ' . $headDeposit->total_amount. ' | ';
            //echo '<br>';
        }
        echo '입금 금액 : ' . $deposit_amount;
        echo ' | ';

        //정산금액
        $sum_deposits = $minus_amount + $deposit_amount;
        echo '정산 : ' . $sum_deposits;
        echo '   ||||    ';

        //발행 칩 현황

        //칩 발행 조회
        $chips = Headquarter::whereDate('created_at', '=', $this->yesterdayDate)->get();
        $release_amount = 0;
        $bonus_amount = 0;
        foreach ($chips as $chip){
            $release_amount += $chip->amount;
            $bonus_amount += $chip->bonus_amount;
        }
        echo '발행 칩 : ' . $release_amount;
        echo ' | ';
        echo '보너스 칩 : ' . $bonus_amount;
        echo ' | ';
        $total_chips = $release_amount + $bonus_amount;
        echo '합계 : ' . $total_chips;
        echo '<br><br>';


        //-----------------수수료-----------------------------
        //본사 하위 회원 시퀀스 조회
        $users = DB::table($this->user_table)
            ->rightJoin('recommends', $this->user_table.'.id', '=', 'recommends.user_id')
            ->whereNotNull($this->user_table. '.account_id')
            ->where('recommends.step1_id', '=', $this->company_id)
            ->select('users.account_id')->get();
        //dd($users);

        $userArray = array();
        foreach ($users as $user) {
            array_push($userArray, $user->account_id);
        }
        //일반게임
        $houses = HouseEdge::where('channel', '=', 'normal')
            ->whereDate('log_date', '=', $this->yesterdayDate)
            ->whereIn('AccountUniqueID', $userArray)
            ->get();

        $sum = 0;
        foreach ($houses as $house){
            $sum += $house->fee;
            //echo $house->fee . '<br>';
        }
        echo '노멀수수료총액 : ' . $sum. ' | ';

        //백분율
        $normal_master  = $sum * $this->normal_master_per / 100;
        $normal_company = $sum * $this->normal_company_per / 100;
        $normal_jackopt = $sum * $this->normal_jackpot_per / 100;

        //$outQuote
        $normal_master_point  = floor($normal_master / $this->outQuote);
        $normal_company_point = floor($normal_company / $this->outQuote);
        $normal_jackopt_point = floor($normal_jackopt / $this->outQuote);

        echo '마스터 수수료 : ' . $normal_master . ' | ' . $normal_master_point;
        echo '본사 수수료 : ' . $normal_company . ' | ' . $normal_company_point;
        echo '잭팟 수수료 : ' . $normal_jackopt . ' | ' . $normal_jackopt_point;
        echo '<br><br>';
        
        //싯앤고게임
        $houses = HouseEdge::where('channel', '=',  'sitngo')
            ->whereDate('log_date', '=', $this->yesterdayDate)
            //->whereIn('AccountUniqueID', $userArray)
            ->get();

        $sum = 0;
        foreach ($houses as $house){
            $sum += $house->fee;
        }
        echo '싯앤고수수료총액 : ' . $sum. ' | ';
        //백분율
        $sit_master  = $sum * $this->sit_master_per / 100;
        $sit_company = $sum * $this->sit_company_per / 100;

        $sit_master_point  = floor($sit_master / $this->outQuote);
        $sit_company_point = floor($sit_company / $this->outQuote);

        echo '마스터 수수료 : ' . $sit_master . ' | ' . $sit_master_point;
        echo '본사 수수료 : ' . $sit_company . ' | ' . $sit_company_point;
        echo '<br><br>';
        //토너먼트게임
        $houses = HouseEdge::where('channel', '=', 'tournament')
            ->whereDate('log_date', '=', $this->yesterdayDate)
            //->whereIn('AccountUniqueID', $userArray)
            ->get();
        $sum = 0;
        foreach ($houses as $house){
            $sum += $house->fee;
        }
        echo '토너먼트수수료총액 : ' . $sum. ' | ';
        //백분율
        $tour_master  = $sum * $this->tour_master_per / 100;
        $tour_company = $sum * $this->tour_company_per / 100;

        $tour_master_point  = floor($tour_master / $this->outQuote);
        $tour_company_point = floor($tour_company / $this->outQuote);

        echo '마스터 수수료 : ' . $tour_master . ' | ' . $tour_master_point;
        echo '본사 수수료 : ' . $tour_company . ' | ' . $tour_master_point;

        echo '<br><br>';

        //유통 칩 현황
        //본사 구입하고 남음 칩 갯수
        /*$add_cnt        = HeadquarterLog::whereDate('created_at', '=', $this->yesterdayDate)
            ->where('use_point', '=', '0')
            ->where('po_content' , '<>', 'daily_resale')
            ->sum('point');
        $minus_cnt      = HeadquarterLog::whereDate('created_at', '=', $this->yesterdayDate)->where('point', '=', '0')->sum('use_point');*/
        $add_cnt            = HeadquarterLog::where('use_point', '=', '0')->where('po_content' , '<>', 'daily_resale')->sum('point');
        $minus_cnt          = HeadquarterLog::where('point', '=', '0')->sum('use_point');
        $payed_point        = $add_cnt - $minus_cnt;

        echo '본사 구입후에 남은 칩' . $payed_point;
        echo '  |  ';

        //본사 재판매갯수
        //=재판매  : 일반게임+토너먼트+싯앤고 수수료 중 본사 몫의 칩 수량을 포인트로 변환한다.
        //$re_sale_cnt = $normal_company + $sit_company + $tour_company;
        $re_sale_cnt = $normal_company_point + $sit_company_point + $tour_company_point;

        echo '본사 재판매 포인트로 환산 : ' . $re_sale_cnt;
        echo '  |  ';

        $total_company_chips = $payed_point + $re_sale_cnt;

        echo '본사 칩수 합계 : ' . $total_company_chips;
        echo '<br><br>';


        //유저 보유 게임칩 총 갯수
        $game_chips = GameMember::whereIn('AccountUniqueid', $userArray)
            ->select(DB::raw('sum(convert(bigint,(convert(decimal(38), Have_Money) / 100000000))) as chips'))
            ->get();
        //$game_chips = GameMember::select(DB::raw('sum(convert(bigint,(convert(decimal(38), Have_Money) / 100000000))) as chips'))->get();
        //dd($game_chips);

        $game_total_chips = 0;
        foreach ($game_chips as $game_chip){
            //백분율 계산
            $game_total_chips = $game_chip->chips ?? 0;
        }
        /*foreach ($game_chips as $game_chip){
            //백분율 계산
            $game_total_chips = $game_chip->chips / 100;
        }*/

        //게임머니에서 포인트로 변화할때 신청했지만, 금고에 존재하는 것 조회 및 합산
        $t_safer = TSafer::where('flag', '0')->sum('safe_money');
        $game_total_chips += $t_safer;

        //토너먼트 예약 머니 총합 조회후 합산
        $tnmt_regist = GameTourRegist::all()->sum('buyin_money');
        $game_total_chips += $tnmt_regist;

        echo '게임 칩스 총합계 : ' . $game_total_chips;

        //유저 세이퍼 금고
        $safe_amount = GameSafeMoney::all()->sum('safe_money');
        echo '유저 금고 보유 현황 : ' .$safe_amount;


        //잔여 포인트 검색
        /*$add_cnt = Point::where('po_content', 'charge')
            ->whereDate('created_at', '=', $this->yesterdayDate)->get()->sum('point');
        $minus_cnt = Point::where('po_content', 'charge')
            ->whereDate('created_at', '=', $this->yesterdayDate)->get()->sum('use_point');
        */

        /*$step = DepositStep::where('code', 'success')->first();
        $user_point = Deposit::whereDate('created_at', '=', $this->yesterdayDate)
            ->where('step_id', $step->id)
            ->sum('charge_amount');*/
        $add_cnt    = Point::where('use_point', '0')->sum('point');
        $minus_cnt  = Point::where('point', '0')->sum('use_point');
        $user_point = $add_cnt - $minus_cnt;

        //추가로 출금 신청 시 승인 안난것들 조회후 합산
        $refund_step = RefundStep::where('code', 'refund')->first();
        $refund_point = Refund::where('step_id', $refund_step->id)->sum('amount');
        $user_point += $refund_point;

        //게임 머니로 변환 신청 했으나 아직 금고 에 있는 포인트 조회 후 합산
        $t_command_point = Tcommand::all()->sum('val1');
        $user_point += $t_command_point;

        echo '유저 디파짓 포인트  : ' . $user_point;



        //관리자나 무료로 받은 포인트 합계 조회
        $free_cnt = Point::whereIn('po_content', ['join_event', 'admin_charge'])
            ->whereDate('created_at', $this->yesterdayDate)->where('use_point', '0')->sum('point');


        //게임머니 로그 에서 아이템 구매해서 차감된 수치 합산
        $game_item_money = 0;
        $logMoneys = LogMoney::whereIn('AccountUniqueID', $userArray)
            ->whereDate('Fluctuation_date', '=', $this->yesterdayDate)
            ->where('Fluctuation_reason', '9')->get();
        foreach ($logMoneys as $logMoney)
        {
            $replace_val = str_replace('-', '', $logMoney->Fluctuation_money);
            $int_val = floor($replace_val);
            $game_item_money += $int_val;
        }

        echo '|  게임 아이템 구매해서 차감된 값 합계   : ' . $game_item_money;


        //마스터 수수료 합 (노멀 + 토너먼트 + 샛인고)
        $master_total_fee = $normal_master_point + $tour_master_point + $sit_master_point;

        //본사 수수료 합 (노멀 + 토너먼트 + 싯앤고 )
        $company_total_fee = $normal_company_point + $tour_company_point + $sit_company_point;

        //수수료 총합 = 잭팟 + 본사 수수료 합 + 마스터 수수료 합
        $total_fee = $master_total_fee + $company_total_fee + $normal_jackopt_point;

        $daily = DailyinfoMaster::create ([
            'search_date' => $this->yesterdayDate,
            'payment' => $minus_amount,
            'transfer' => $deposit_amount,
            'balance' => $sum_deposits,
            'regular' => $release_amount,
            'bonus' => $bonus_amount,
            'total' => $total_chips,
            'normal_master_fee' => $normal_master_point,
            'normal_company_fee' => $normal_company_point,
            'normal_jack_fee' => $normal_jackopt_point,
            'sit_master_fee' => $sit_master_point,
            'sit_company_fee' => $sit_company_point,
            'tour_master_fee' => $tour_master_point,
            'tour_company_fee' => $tour_company_point,
            'company_chip_payment' => $payed_point,
            'company_chip_reload' => $re_sale_cnt,
            'company_chip_total' => $total_company_chips,
            'user_chips' => $game_total_chips,
            'user_safe' => $safe_amount,
            'user_deposit' => $user_point,
            'company_total_fee' => $company_total_fee,
            'master_total_fee' => $master_total_fee,
            'total_fee' => $total_fee,
            'user_free_point' => $free_cnt,
            'game_item_money' => $game_item_money,
        ]);

        //본사 재판매 칩수량을 포인트로 환산하여 headquarters_log 테이블에 등록
        if ((int)$re_sale_cnt > 0) {
            $add_cnt = HeadquarterLog::where('user_id', '=', $this->company_id)->where('use_point', '=', '0')->sum('point');
            $minus_cnt = HeadquarterLog::where('user_id', '=', $this->company_id)->where('point', '=', '0')->sum('use_point');
            $user_point = $add_cnt - $minus_cnt;

            HeadquarterLog::create([
                'user_id' => $this->company_id,
                'daily_id' => $daily->id,
                'po_content' => 'daily_resale',
                'point' => $re_sale_cnt,
                'mb_point' => $user_point,
            ]);
        }
    }

    public function company()
    {
        Log::channel('calcul_company')->info('check Date : '. $this->yesterdayDate);

        //유통 금액 현황
        //유저가해당일에 충전한 액수
        $step = DepositStep::where('code', 'success')->first();
        $user_charge_total = Deposit::whereDate('updated_at', '=', $this->yesterdayDate)
            ->where('step_id', $step->id)
            ->sum('charge_amount');
        echo '회원 총 판매 금액 : ' . $user_charge_total;
        echo ' | ';

        //유저 환전 금액 조회
        $refund_step = RefundStep::where('code', 'refund_ok')->first();
        $user_refund_total = Refund::whereDate('updated_at', '=', $this->yesterdayDate)
            ->where('step_id', $refund_step->id)
            ->sum('amount');
        echo '회원 환전 금액 : ' . $user_refund_total;
        echo '<br><br>';

        //마스터 정산 테이블조회
        //어제 날짜로 조회
        $dailyMaster = DailyinfoMaster::whereDate('search_date', '=', $this->yesterdayDate)->orderBy('id', 'desc')->first();

        echo '본사 보유칩 합계' . $dailyMaster->company_chip_total;
        echo '  |  ';
        echo '본사 보유칩 구입' . $dailyMaster->company_chip_payment;
        echo '  |  ';
        echo '본사 보유칩 재판매' . $dailyMaster->company_chip_reload;
        echo '  |  ';
        echo '유저 보유칩' . $dailyMaster->user_chips;
        echo '<br><br>';

        echo '유저 금고 : ' . $dailyMaster->user_safe;
        echo '  |  ';
        echo '유저 디파짓 : ' . $dailyMaster->user_deposit;
        echo '<br><br>';

        echo '수수료 일반게임 본사만 : ' . $dailyMaster->normal_company_fee;
        echo '  |  ';
        echo '수수료 토너먼트게임 본사만 : ' . $dailyMaster->tour_company_fee;
        echo '  |  ';
        echo '수수료 싯앤고게임 본사만 : ' . $dailyMaster->sit_company_fee;
        echo '<br><br>';

        //본사 수익
        //(판매금액 x 0.295) x 본사비율% = 본사 수익
        /*
         * 판매금액 : $user_charge_total
         *$this->saleFee
         *본사 비율 : $this->본사비율
         * */

        //수수료를 백분율로 환산
        $fee_back = $this->company_fee / 100;
        $company_rev = ($user_charge_total * $this->saleFee) * $fee_back;
        echo '본사 수익 : ' .$company_rev;


        DailyinfoCompany::create([
            'search_date' => $this->yesterdayDate,
            'total_payment'=> $user_charge_total,
            'total_refund'=>  $user_refund_total,
            'company_chip_payment' => $dailyMaster->company_chip_payment,
            'company_chip_reload' => $dailyMaster->company_chip_reload,
            'company_chip_total' => $dailyMaster->company_chip_total,
            'user_chips' => $dailyMaster->user_chips,
            'user_safe' => $dailyMaster->user_safe,
            'user_deposit' => $dailyMaster->user_deposit,
            'normal_company_fee' => $dailyMaster->normal_company_fee,
            'tour_company_fee' => $dailyMaster->tour_company_fee,
            'sit_company_fee' => $dailyMaster->sit_company_fee,
            'company_rev' => $company_rev,
            'normal_jack_fee' => $dailyMaster->normal_jack_fee,
            'normal_master_fee' => $dailyMaster->normal_master_fee,
            'tour_master_fee' => $dailyMaster->tour_master_fee,
            'sit_master_fee' => $dailyMaster->sit_master_fee,
            'company_total_fee' => $dailyMaster->company_total_fee,
            'master_total_fee' => $dailyMaster->master_total_fee,
            'total_fee' => $dailyMaster->total_fee,
            'user_free_point' => $dailyMaster->user_free_point,
            'game_item_money' => $dailyMaster->game_item_money,
        ]);
    }
}
