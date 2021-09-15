<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    protected $fillable = [
        'province_id',
        'city',
        'type',
        'state_capital',
    ];

    public $timestamps = false;
}
