<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnitTarget extends Model
{
    protected $table = 'unit_targets';
    protected $fillable = [
        'name'
    ];

    public $timestamps = false;
}
