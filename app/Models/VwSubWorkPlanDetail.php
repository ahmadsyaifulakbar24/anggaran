<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VwSubWorkPlanDetail extends Model
{
    protected $table = 'vw_sub_work_plan_detail';
    public $timestamps = false;

    public function work_plan()
    {
        return $this->belongsTo(WorkPlan::class, 'work_plan_id');
    }


    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
