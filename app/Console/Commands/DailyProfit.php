<?php

namespace App\Console\Commands;

use App\Http\Controllers\DailyProfitController;
use Illuminate\Console\Command;

class DailyProfit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DailyCal:profit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $test = new DailyProfitController();
        $test->index();
    }
}
