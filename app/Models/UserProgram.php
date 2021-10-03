<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProgram extends Model
{
    protected $table = 'user_programs';
    protected $fillable = [
        'user_id',
        'program_id'
    ];
}
