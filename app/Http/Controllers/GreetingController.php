<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Models\User;
use App\Models\DateOfBirth;

class GreetingController extends Controller
{
    public function sendmail()
    {
        $today = date('Y-m-d');
        $users = User::where('date_of_birth', $today)->get();
        dd($users);
        foreach($users as $user){
            $user_id = $user->id;
            $fetch_data = DateOfBirth::where('user_id', $user_id)->count();

            if($fetch_data == 0){
                $details = array(
                    'name'=> $user->name,
                    
                    
                );
                // $details = [
                //     'title' => 'Mail title',
                //     'body' => 'Mail Body',
                // ];

                Mail::to($user->email)->send(new TestMail($details));
            

                $insert_data = DateOfBirth::insert(['user_id' => $user->id, 'year' => $user->date_of_birth]);
            }
        // $details = [
        //     'title' => 'Mail title',
        //     'body' => 'Mail Body',
        // ];
        // Mail::to( n"minar.barc@gmail.com")->send(new TestMail($details));
        }
        return "Email Sent";
    }
}
