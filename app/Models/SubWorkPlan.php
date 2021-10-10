<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubWorkPlan extends Model
{
    protected $table = 'sub_work_plans';
    protected $fillable = [
        'work_plan_id',
        'province_id',
        'city_id'
    ];

    public $timestamps = false;

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function work_plan()
    {
        return $this->belongsTo(WorkPlan::class, 'work_plan_id');
    }
}
