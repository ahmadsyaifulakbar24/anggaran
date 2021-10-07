<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRo extends Model
{
    protected $table = 'user_ro';
    protected $fillable = [
        'user_id',
        'user_kro_id',
        'code_ro',
        'ro',
        'unit_id'
    ];

    public function work_plan ()
    {
        return $this->hasMany(WorkPlan::class, 'user_ro_id');
    }
}
