<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    protected $table = 'user_activities';
    protected $fillable = [
        'user_id',
        'unit_id',
        'user_program_id',
        'activity_id'
    ];

    public function  user_kro()
    {
        return $this->hasMany(UserKro::class, 'user_activity_id');
    }
}
