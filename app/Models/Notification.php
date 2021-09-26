<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Notification extends Model
{
    protected $table = 'notifications';
    protected $fillable = [
        'work_plan_id',
        'history_id',
        'created_by',
        'sent_to',
        'type',
        'read',
        'date_read',
    ];

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }
    
    public function getUpdatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function work_plan()
    {
        return $this->belongsTo(WorkPlan::class, 'work_plan_id');
    }

    public function history()
    {
        return $this->belongsTo(History::class, 'history_id');
    }

    public function user_created()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function user_sent_to()
    {
        return $this->belongsTo(User::class, 'sent_to');
    }
}
