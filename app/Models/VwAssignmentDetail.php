<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VwAssignmentDetail extends Model
{
    protected $table = 'vw_assignment_detail';
    public $timestamps = false;

    public function work_plan()
    {
        return $this->belongsTo(WorkPlan::class, 'work_plan_id');
    }

    public function assignment()
    {
        return $this->belongsTo(Param::class, 'assignment_id');
    }
}
