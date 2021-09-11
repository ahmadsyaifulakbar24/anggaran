<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodeRo extends Model
{
    protected $table = 'code_ro';
    protected $fillable = [
        'code_ro',
        'ro',
        'unit_id'
    ];
}
