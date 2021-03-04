<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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
        foreach ($mentors as $mentor) {

            // $mentor->push($this->payoutCalculate($mentor->id));

            $creator = [
                'id' => $mentor->id,
                'name' => $mentor->fname,
                'email' => $mentor->email,
                'payout' => $this->payoutCalculate($mentor),
                'month' => Carbon::now()->subMonth()->format('F'),
                'year' => Carbon::now()->subMonth()->format('Y'),
            ];

            $creators[] = $creator;

        }
    }
}
