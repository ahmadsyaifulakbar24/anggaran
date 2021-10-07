<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProgram extends Model
{
    protected $table = 'user_programs';
    protected $fillable = [
        'user_id',
        'unit_id',
        'program_id'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function user_activity()
    {
        return $this->hasMany(UserActivity::class, 'user_program_id');
    }
}
