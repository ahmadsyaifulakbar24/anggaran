<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';
    protected $fillable = [
        'work_plan_id',
        'created_by',
        'sent_to',
        'type',
        'read'
    ];
}
