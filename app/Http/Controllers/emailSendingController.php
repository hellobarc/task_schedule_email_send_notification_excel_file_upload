<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notification\EmailNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Models\DateOfBirth;
use App\Models\Campaign;
use App\Models\CampaignLog;
use App\Models\EventEamil;
use App\Models\CampaignEmailSendCount;

class EmailSendingController extends Controller
{
    public function emailSend(Request $request)
    {
        $today = date('Y-m-d'); // Get the date
        $campaign = Campaign::where('campaign_date', '<=', $today)->get(); // Past date campaign mean its already running //
        foreach($campaign as $camp){
            $group_id = $camp->group_id;
            $campaign_id = $camp->id;
            $get_user = CampaignLog::where('campaign_id', $campaign_id)->get(); // Get all user that hav in the log= campaign id
            $blank_array = [];
            if($get_user->count()){
                foreach($get_user as $get)
                {
                    $jkck = $get->user_id;
                    $arrayPush = array_push( $blank_array, $jkck);
                }
            }
            $users = User::where('group_id', $group_id)->whereNotIn('id',$blank_array)->take(2)->get(); 

            foreach($users as $user){
               $user_id = $user->id;
                     $details = array(
                        'name'=> $user->name,
                       'email' => $user->email,
                     );
                    $sendMail = Mail::to($user->email)->send(new TestMail($details));
                    $insertLog = CampaignLog::insert(['campaign_id' => $campaign_id,'user_id' => $user_id]);
                  //  $last_count  = CampaignEmailSendCount::where('campaign_id',$campaign_id)->pluck('total_user')->latest()->first();
                  //  $insertEmailCount = CampaignEmailSendCount::updateOrCreate(['campaign_id' => $campaign_id,'total_user' => $last_count+1, 'email_count'=> $last_count+1]);
            }
        }
        echo"email";
	}

    
}
