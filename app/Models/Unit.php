<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'units';
    protected $fillable = [
        'name'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->hasMany(User::class, 'unit_id');
    }
}
