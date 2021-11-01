<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminSetting extends Model
{
    protected $table = 'admin_settings';
    protected $fillable = [
        'message'
    ];
    public $timestamps = false;
}
