<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kro extends Model
{
    protected $table = 'kro';
    protected $fillable = [
        'code_kro_non_pn',
        'code_kro_pn',
        'kro',
        'unit'
    ];

    public $timestamps = false;

    public function user_ro()
    {
        return $this->hasMany(UserRo::class, 'user_ro_id');
    }
}
