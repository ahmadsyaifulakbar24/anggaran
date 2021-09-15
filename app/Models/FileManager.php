<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class FileManager extends Model
{
    protected $table = 'file_managers';
    protected $fillable = [
        'work_plan_id',
        'file',
        'type_id'
    ];

    protected $appends = [
        'file_url'
    ];

    public function type()
    {
        return $this->belongsTo(Param::class, 'type_id');
    }

    public function getFileUrlAttribute()
    {
        return url('') . Storage::url($this->attributes['file']);
    }

}
