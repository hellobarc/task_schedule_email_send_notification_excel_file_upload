<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    protected $fillable = [
        'campaign_name',
        'group_id',
        'email_subject',
        'message_id',
        'campaign_date',
    ];
}
