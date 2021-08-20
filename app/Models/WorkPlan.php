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

    public function history()
    {
        return $this->hasMany(History::class, 'work_plan_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function file_manager()
    {
        return $this->hasMany(FileManager::class, 'work_plan_id');
    }
}
