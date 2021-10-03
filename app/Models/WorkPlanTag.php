<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkPlanTag extends Model
{
    protected $table = 'work_plan_tags';
    protected $fillable = [
        'work_plan_id',
        'param_id',
        'category',
    ];

    public $timestamps = false;
}
