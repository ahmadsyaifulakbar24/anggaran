<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'programs';
    protected $fillable = [
        'code_program',
        'parent_id',
        'parent_path',
        'description',
        'program_type'
    ];

    public function parent()
    {
        return $this->belongsTo(Program::class, 'parent_id');
    }
}
