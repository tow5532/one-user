<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\DailyCalculateController;

class DailyMaster extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DailyCal:master';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily Master User Calculate';

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
        $test = new DailyCalculateController();

        $test->index();
    }
}
