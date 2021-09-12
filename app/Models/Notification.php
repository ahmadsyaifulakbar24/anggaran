<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
