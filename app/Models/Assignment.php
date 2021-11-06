<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $table = 'assignments';
    protected $fillable = [
        'work_plan_id',
        'assignment_id'
    ];
    public $timestamps = false;

    public function assignment ()
    {
        return $this->belongsTo(Param::class, 'assignment_id');
    }
}
