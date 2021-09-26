<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VwWorkPlanDetail extends Model
{
    protected $table = 'vw_work_plan_detail';

    public $timestamps = false;

    public function sub_work_plan ()
    {
        return $this->hasMany(SubWorkPlan::class, 'work_plan_id');
    }
}
