<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kro extends Model
{
    protected $table = 'kro';
    protected $fillable = [
        'code_kro',
        'name'
    ];

    public $timestamps = false;
}
