<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserKro extends Model
{
    protected $table = 'user_kro';
    protected $fillable = [
        'user_id',
        'unit_id',
        'user_activity_id',
        'kro_id',
        'type_kro'
    ];

    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function unit () 
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function kro()
    {
        return $this->belongsTo(Kro::class, 'kro_id');
    }

    public function user_ro()
    {
        return $this->hasMany(UserRo::class, 'user_kro_id');
    }
}
