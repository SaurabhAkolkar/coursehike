<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Carbon\Carbon;
use App\CreatorPayout;

class MonthyUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monthly:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add Monthly records to creator revenue';

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

        $mentors = User::where([['role','mentors'],['status','1']])->get();
        $creators = array();
        $date = Carbon::now()->subMonth();
        foreach ($mentors as $mentor) {

            $payout =  app('App\Http\Controllers\CompletedPayoutController')->payoutCalculate($mentor);

            $creator = [
                'user_id' => $mentor->id,
                'subscription_amount'=> $payout['subscribers_total_income'],
                'course_amount' => $payout['course_sale']['total_income'],
                'status'=> 'pending',
                'start_date' => $date->startOfMonth()->format('Y-m-d'),
                'end_date' =>  $date->endOfMonth()->format('Y-m-d'),
            ];

            CreatorPayout::create($creator);
        }
    }
}
