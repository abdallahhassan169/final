<?php

namespace App\Console\Commands;
use App\Mail\Timer;
use Mail;
use Illuminate\Console\Command;
use App\Models\User;
use App\Models\models\Schedule;

class time extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'medicine:time';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'medicie time';

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
     * @return int
     */
    public function handle()
    {
      $schedules=Schedule::all();
      foreach ($schedules as $sch) {

        $email=User::where('id',$sch->user_id)->get('email');
        $medicine=$sch->medicine;
        Mail::to($email)
  ->bcc("sovghab@gmail.com")
  ->later(20,new Timer($medicine));
  $sch->update(['is_on'=>1]);


      }
}

}
