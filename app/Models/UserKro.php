<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserKro extends Model
{
    protected $table = 'user_kro';
    protected $fillable = [
        'user_id',
        'user_activity_id',
        'kro_id',
        'type_kro'
    ];

    public function user_ro()
    {
        return $this->hasMany(UserRo::class, 'user_kro_id');
    }
}
