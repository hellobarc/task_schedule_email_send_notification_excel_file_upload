<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignEmailSendCount extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_id',
        'total_user',
        'email_count',
    ];
}
