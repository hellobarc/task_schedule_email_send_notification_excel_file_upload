<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Models\User;
use App\Models\DateOfBirth;
use Excel;
use App\Exports\UsersExport;
use App\Imports\UsersImport;

class HomeController extends Controller
{
    public function index()
    {
        // // $user = User::first();
        // // Notification::send($user, new EmailNotification());
        // // dd('email notification');
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
    public function sendmail()
    {
        $details = [
            'title' => 'Mail title',
            'body' => 'Mail Body',
        ];
        Mail::to("minar.barc@gmail.com")->send(new TestMail($details));
        return "Email Sent";
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
    //    $users = User::all();
        return view('backend.emport');
    }
    public function exportUser()
    {
    //    $users = User::all();
        // return view('backend.emport', compact('users'));
        // dd('export');
        return Excel::download(new UsersExport, 'downloaded-all-users-file.xlsx');
    }
    public function emportUser(Request $request)
    {
    //    $users = User::all();
        // return view('backend.emport', compact('users'));
        Excel::import(new UsersImport, request()->file('file'));

       return redirect()->route('user_about');
    }
}
