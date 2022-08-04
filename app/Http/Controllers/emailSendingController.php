<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notification\EmailNotification;
use Illuminate\Support\Facades\Notification;

class emailSendingController extends Controller
{
    public function index()
    {
        $user = User::first();
        Notification::send($user, new EmailNotification());
        dd('done');
	}

    
}
