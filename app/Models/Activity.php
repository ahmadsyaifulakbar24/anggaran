<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';
    protected $fillable = [
        'program_id',
        'parent_id',
        'parent_path',
        'code_activity',
        'description',
        'created_by',
        'updated_by',
        'unit_id',
        'activity_type'
    ];
}
