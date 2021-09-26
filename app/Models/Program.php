<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Program extends Model
{
    protected $table = 'programs';
    protected $fillable = [
        'code_program',
        'parent_id',
        'parent_path',
        'description',
        'created_by',
        'updated_by',
        'program_type'
    ];

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }
    
    public function getUpdatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }
    
    public function parent()
    {
        return $this->belongsTo(Program::class, 'parent_id');
    }

    public function activity()
    {
        return $this->hasMany(Program::class, 'parent_id');
    }

    public function work_plan()
    {
        return $this->hasMany(WorkPlan::class, 'program_id');
    }

    public function created_by_data()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updated_by_data()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
