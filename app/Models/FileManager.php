<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileManager extends Model
{
    protected $table = 'file_managers';
    protected $fillable = [
        'work_plan_id',
        'file'
    ];
}
