<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\DateOfBirth;

class TestCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:cron';

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
     * @return int
     */
    public function handle()
    {
        $today = date('Y-m-d');
        $users = User::where('date_of_birth', $today)->get();

        foreach($users as $user){
            $user_id = $user->id;
            $fetch_data = DateOfBirth::where('user_id', $user_id)->count();

            if($fetch_data == 0){
                $name = array(
                    'name'=> $user->name,
                   
                    
                );

                Mail::send('email.testmail', $name, function($message) use($user){
                    $message->to($user->email)->subject('Cron job testing mail');
                });
            

                $insert_data = DateOfBirth::insert(['user_id' => $user->id, 'year' => $user->date_of_birth]);
            }
           

        }
        
        
    }
}
