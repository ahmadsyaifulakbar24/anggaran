<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryStatus extends Model
{
    protected $table = 'history_statuses';
    protected $fillable = [
        'status',
        'description'
    ];

    public $timestamps = false;
}
