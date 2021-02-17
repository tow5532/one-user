<?php

namespace App\Console\Commands;

use App\Http\Controllers\DailyCalculateSubController;
use Illuminate\Console\Command;

class DailySub extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DailyCal:sub';

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
        $test = new DailyCalculateSubController;

        $test->sub('sub_company');
        $test->sub('distributor');
        $test->sub('store');
    }
}
