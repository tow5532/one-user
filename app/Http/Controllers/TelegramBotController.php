<?php

namespace App\Http\Controllers;

use App\Notifications\Deposit;
use App\User;
use Illuminate\Http\Request;

class TelegramBotController extends Controller
{
    public function index()
    {
        $users = User::where('username', 'tow55322')->first();


        $admin_telegram = User::where('username', 'master')->first();
        $admin_telegram2 = User::where('username', 'sunmaster')->first();

        $arr = [
            'deposit_amount' => 10000,
            'admin_telegram_id' => 614548590,
        ];

        $arr2 = [
            'deposit_amount' => 5000,
            'admin_telegram_id' => $admin_telegram2->telegram_id,
        ];

        $result = $users->notify(new Deposit($arr));
        //$result2 = $users->notify(new Deposit($arr2));


    }
}
