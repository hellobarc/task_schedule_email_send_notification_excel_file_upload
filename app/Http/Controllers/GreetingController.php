<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Models\User;
use App\Models\DateOfBirth;
use App\Models\Campaign;
use App\Models\CampaignLog;
use App\Models\EventEamil;

class GreetingController extends Controller
{
    public function sendmail()
    {
        $today = date('Y-m-d');
        $users = User::where('date_of_birth', $today)->get();
        // dd($users);
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
            }else{
                echo "Already Sent".$user->name;
                echo "<br>";
            }
        // $details = [
        //     'title' => 'Mail title',
        //     'body' => 'Mail Body',
        // ];
        // Mail::to( n"minar.barc@gmail.com")->send(new TestMail($details));
        }
        return 200;
    }
    public function emailSending()
    {
        $today = date('Y-m-d');
        $campaign_date = Campaign::where('campaign_date', '>=', $today)->get();
       
        foreach($campaign_date as $date)
        {
            $groupId = $date->group_id;
            $messageId = $date->message_id;
            $users = User::where('group_id', $groupId)->get();
            $message = EventEamil::where('id', $messageId)->get();
            foreach($users as $user)
            {

                $fetch_data = CampaignLog::where('user_id', $user->id)->where('campaign_id', $date->id)->count();
                if($fetch_data == 0){
                    $userId = $user->id;
                    $name = $user->name;
                    $email = $user->email;
                    // $details[] = array(
                    //     'name' =>$user->name,
                    //     'email' =>$user->email,
                    //     'id' => $user->id,
                    // );

                    Mail::to($email)->send(new TestMail($name));
            

                    $insert_data = CampaignLog::insert(['user_id' => $userId, 'campaign_id' => $date->id]);
                }
                
            }
      
        }
        return 'email send';
        
    }
}
