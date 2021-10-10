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
        'unit_target',
        'unit_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
    
    public function work_plan ()
    {
        return $this->hasMany(WorkPlan::class, 'user_ro_id');
    }
}
