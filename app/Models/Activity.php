<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Activity extends Model
{
    protected $table = 'activities';
    protected $fillable = [
        'program_id',
        'parent_id',
        'parent_path',
        'code_activity',
        'description',
        'created_by',
        'updated_by',
        'unit_id',
        'activity_type'
    ];

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }
    
    public function getUpdatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function parent()
    {
        return $this->belongsTo(Activity::class, 'parent_id');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updated_by()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
}
