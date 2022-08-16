<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventEamil extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_email_subject',
        'event_email_body',
    ];
}
