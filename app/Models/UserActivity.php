<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    protected $table = 'user_activities';
    protected $fillable = [
        'user_id',
        'user_program_id',
        'activity_id'
    ];
}
