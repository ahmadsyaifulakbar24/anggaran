<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubWorkPlan extends Model
{
    protected $table = 'sub_work_plans';
    protected $fillable = [
        'work_plan_id',
        'city_id'
    ];

    public $timestamps = false;
}
