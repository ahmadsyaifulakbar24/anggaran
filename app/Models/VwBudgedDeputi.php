<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VwBudgedDeputi extends Model
{
    protected $table = 'vw_budged_deputi';

    public $timestamps = false;

    public function budged_asdep()
    {
        return $this->hasMany(VwBudgedAsdep::class, 'unit_id');
    }
}
