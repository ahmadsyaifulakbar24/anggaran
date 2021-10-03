<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class WorkPlan extends Model
{
    protected $table = 'work_plans';
    protected $fillable = [
        'user_id',
        'unit_id',
        'user_ro_id',
        'component_code',
        'component_name',
        'title',
        'total_target',
        'unit_target',
        'budged',
        'detail',
        'description',
        'deputi_status',
        'admin_status'
    ];

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function history()
    {
        return $this->hasMany(History::class, 'work_plan_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function kro()
    {
        return $this->belongsTo(Kro::class, 'kro_id');
    }

    public function ro()
    {
        return $this->belongsTo(CodeRo::class, 'ro_id');
    }
    
    public function file_manager()
    {
        return $this->hasMany(FileManager::class, 'work_plan_id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'work_plan_id');
    }

    public function sub_work_plan()
    {
        return $this->hasMany(SubWorkPlan::class, 'work_plan_id');
    }

    public function sub_work_plan_many()
    {
        return $this->belongsToMany(City::class, 'sub_work_plans', 'work_plan_id', 'city_id');
    }

    public function notification()
    {
        return $this->hasMany(Notification::class, 'work_plan_id');
    }

    public function unit_target_data()
    {
        return $this->belongsTo(UnitTarget::class, 'unit_target');
    }

}
