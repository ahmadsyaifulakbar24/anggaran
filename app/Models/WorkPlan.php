<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkPlan extends Model
{
    protected $table = 'work_plans';
    protected $fillable = [
        'program_id',
        'title',
        'total_target',
        'unit_target',
        'budged',
        'province_id',
        'city_id',
        'detail',
        'description',
        'status'
    ];
}
