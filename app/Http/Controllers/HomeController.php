<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Models\User;
use App\Models\DateOfBirth;
use App\Models\Event;
use App\Models\EventEamil;
use App\Models\Group;
use App\Models\Campaign;
use Excel;
use App\Exports\UsersExport;
use App\Imports\UsersImport;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = User::all();
        return view('backend.index', compact('users'));
    }

    public function welcome()
    {
       
        return view('welcome');
    }

    public function hello()
    {
        $user = User::first();
        Notification::send($user, new EmailNotification());
        dd('email notification');
        // $users = User::where('data_of_birth', today())->get();
        // foreach($users as $user){
        //      //$insert_data = DateOfBirth::insert(['user_id' => $user->id, 'year' => $user->data_of_birth]);
        //     // $data = array(
        //     //     'name'=> $user->name,
        //     //     'email'=> $user->email,
        //     // );
        // }
        // dd($user_email);
    }
   
    public function adminLTE()
    {
       
        // return view('backend.index');
    }
    public function allUser()
    {
       $users = User::all();
        return view('backend.index', compact('users'));
    }
    public function excel()
    {
       $group_info = Group::all();
        return view('backend.emport', compact('group_info'));
    }
    public function exportUser()
    {
    //    $users = User::all();
        // return view('backend.emport', compact('users'));
        // dd('export');
        return Excel::download(new UsersExport, 'uploaded-format.xlsx');
    }
    public function emportUser(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx',
            'group_info' => 'required',
        ],
        [
            'file.file' =>'Insert a valid file like .xls and .xlsx extension',
            'group_info.required' =>'Please Insert a valid group name'
        ]
        );

        Excel::import(new UsersImport($request->input('group_info')), request()->file('file'));
        

       return redirect()->route('user_about');
    }
    /**
     * 
     * Group Management
     */

     //all groups
    public function allGroup()
    {
        $groups = Group::all();
        return view('backend.group.index', compact('groups'));
    }
    //create event
    public function createGroup()
    {
        return view('backend.group.create');
    }
    //store event
    public function saveGroup(Request $request)
    {
        $request->validate([
            'group_name' => 'required',
           
 
        ],
        [
            'group_name.required' => 'Please Provide Group Name',
            
        ]);

        $group = new Group();
        $group->group_name = $request->group_name;
        $group->save();
        return redirect()->route('all_group');
    }
    //edit event
    public function editGroup($id)
    {
        $group = Group::find($id);
        return view('backend.group.edit', compact('group'));
    }
    //update event
    public function updateGroup(Request $request, $id)
    {
        $request->validate([
            'group_name' => 'required',
           
 
        ],
        [
            'group_name.required' => 'Please Provide Group Name',
            
        ]);

        $group = Group::find($id);
        $group->group_name = $request->group_name;
        $group->save();
        return redirect()->route('all_group');
    }
    public function deleteGroup( $id)
    {
        $group = Group::find($id);
        $group->delete();
        return back();
    }

    /**
     * 
     * Event Management
     */
    //all event
    public function allEvent()
    {
        $events = Event::all();
        return view('backend.event.index', compact('events'));
    }
    //create event
    public function createEvent()
    {
        return view('backend.event.create');
    }
    //store event
    public function saveEvent(Request $request)
    {
        $request->validate([
            'event_name' => 'required',
            'event_date' => 'required',
 
        ],
        [
            'event_name.required' => 'Please Provide Brand Name',
            'event_date.required' => 'Please Provide Brand Name',
            
        ]);

        $event = new Event();
        $event->event_name = $request->event_name;
        $event->event_date = $request->event_date;
        $event->save();
        return redirect()->route('all_event');
    }
    //edit event
    public function editEvent($id)
    {
        $event = Event::find($id);
        return view('backend.event.edit', compact('event'));
    }
    //update event
    public function updateEvent(Request $request, $id)
    {
        $request->validate([
            'event_name' => 'required',
            'event_date' => 'required',
 
        ],
        [
            'event_name.required' => 'Please Provide Brand Name',
            'event_date.required' => 'Please Provide Brand Name',
            
        ]);

        $event = Event::find($id);
        $event->event_name = $request->event_name;
        $event->event_date = $request->event_date;
        $event->save();
        return redirect()->route('all_event');
    }
    public function deleteEvent( $id)
    {
        $event = Event::find($id);
        $event->delete();
        return back();
    }
    /**
     * 
     * event email sending controller
     */
    //all event email
    public function allEventEamil()
    {
        $events_email = EventEamil::all();
        return view('backend.event_email.index', compact('events_email'));
    }
    //create event email
    public function createEventEamil()
    {
        return view('backend.event_email.create');
    }
    //store event email
    public function saveEventEamil(Request $request)
    {
        $request->validate([
            'event_email_subject' => 'required',
            'event_email_body' => 'nullable',
 
        ],
        [
            'event_email_subject.required' => 'Please Provide Brand Name',
        ]);

        $eventEamil = new EventEamil();
        $eventEamil->event_email_subject = $request->event_email_subject;
        $eventEamil->event_email_body = $request->event_email_body;
        $eventEamil->save();
        return redirect()->route('all_event_email');
    }
    //edit event email
    public function editEventEamil($id)
    {
        $eventEmail = EventEamil::find($id);
        return view('backend.event_email.edit', compact('eventEmail'));
    }
    //update event email
    public function updateEventEamil(Request $request, $id)
    {
        $request->validate([
            'event_email_subject' => 'required',
            'event_email_body' => 'nullable',
 
        ],
        [
            'event_email_subject.required' => 'Please Provide Brand Name',
        ]);

        $eventEmail = EventEamil::find($id);
        $eventEmail->event_email_subject = $request->event_email_subject;
        $eventEmail->event_email_body = $request->event_email_body;
        $eventEmail->save();
        return redirect()->route('all_event_email');
    }
    public function deleteEventEamil( $id)
    {
        $eventDelete = EventEamil::find($id);
        $eventDelete->delete();
        return back();
    }

    /**
     * 
     * campaign create controller
     */

    public function allCampaign()
    {
        $campaigns = Campaign::all();
        return view('backend.campaign.index', compact('campaigns'));
    }
    // create event email
    public function createCampaign()
    {
        $group_info = Group::all();
        $message_info = EventEamil::all();
        return view('backend.campaign.create', compact('group_info', 'message_info'));
    }
    //store event email
    public function saveCampaign(Request $request)
    {
        $request->validate([
            'campaign_name' => 'required',
            'group_id' => 'required',
            'email_subject' => 'required',
            'message_id' => 'required',
            'campaign_date' => 'required',
 
        ],
        [
            'campaign_name.required' => 'Please Provide campaign name',
            'group_id.required' => 'Please Provide group id',
            'email_subject.required' => 'Please wirte a email subject',
            'message_id.required' => 'Please Provide message id',
            'campaign_date.required' => 'Please Provide campaign date',
        ]);

        $campaign = new Campaign();
        $campaign->campaign_name = $request->campaign_name;
        $campaign->group_id = $request->group_id;
        $campaign->email_subject = $request->email_subject;
        $campaign->message_id = $request->message_id;
        $campaign->campaign_date = $request->campaign_date;
        $campaign->save();
        return redirect()->route('all_campaign');
    }
    //edit event email
    public function editCampaign($id)
    {
        $group_info = Group::all();
        $message_info = EventEamil::all();
        $campaign = Campaign::find($id);
        return view('backend.campaign.edit', compact('campaign','group_info', 'message_info'));
    }
    //update event email
    public function updateCampaign(Request $request, $id)
    {
        $request->validate([
            'campaign_name' => 'required',
            'group_id' => 'required',
            'email_subject' => 'required',
            'message_id' => 'required',
            'campaign_date' => 'required',
 
        ],
        [
            'campaign_name.required' => 'Please Provide campaign name',
            'group_id.required' => 'Please Provide group id',
            'email_subject.required' => 'Please write a email subject',
            'message_id.required' => 'Please Provide message id',
            'campaign_date.required' => 'Please Provide campaign date',
        ]);

        $campaign = Campaign::find($id);
        $campaign->campaign_name = $request->campaign_name;
        $campaign->group_id = $request->group_id;
        $campaign->email_subject = $request->email_subject;
        $campaign->message_id = $request->message_id;
        $campaign->campaign_date = $request->campaign_date;
        $campaign->save();
        return redirect()->route('all_campaign');
    }
    public function deleteCampaign( $id)
    {
        $campaignDelete = Campaign::find($id);
        $campaignDelete->delete();
        return back();
    }


}
