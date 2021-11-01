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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function unit() 
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function activity()
    {
        return $this->belongsTo(Program::class, 'activity_id');
    }

    public function user_program()
    {
        return $this->belongsTo(UserProgram::class, 'user_program_id');
    }

    public function  user_kro()
    {
        return $this->hasMany(UserKro::class, 'user_activity_id');
    }
}
