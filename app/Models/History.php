<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class History extends Model
{
    protected $table = 'histories';
    protected $fillable = [
        'work_plan_id',
        'action_by',
        'status'
    ];

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }
    
    public function getUpdatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }
    
    public function action()
    {
        return $this->belongsTo(User::class, 'action_by');
    }
}
