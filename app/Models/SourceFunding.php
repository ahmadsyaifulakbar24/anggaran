<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SourceFunding extends Model
{
    protected $table = 'source_fundings';
    protected $fillable = [
        'work_plan_id',
        'param_id',
        'nominal'
    ];

    public $timestamps = false;
}
