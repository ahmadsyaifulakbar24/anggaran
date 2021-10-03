<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class FileManager extends Model
{
    protected $table = 'file_managers';
    protected $fillable = [
        'work_plan_id',
        'user_ro_id',
        'file',
        'type_id'
    ];

    protected $appends = [
        'file_url'
    ];

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }
    
    public function getUpdatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }
    
    public function type()
    {
        return $this->belongsTo(Param::class, 'type_id');
    }

    public function getFileUrlAttribute()
    {
        return url('') . Storage::url($this->attributes['file']);
    }

}
