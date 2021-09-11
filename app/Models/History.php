<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'histories';
    protected $fillable = [
        'work_plan_id',
        'action_by',
        'status'
    ];

    public function action()
    {
        return $this->belongsTo(User::class, 'action_by');
    }
}
