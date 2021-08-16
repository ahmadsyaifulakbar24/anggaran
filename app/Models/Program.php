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
        'created_by',
        'updated_by',
        'unit_id',
        'program_type'
    ];

    public function parent()
    {
        return $this->belongsTo(Program::class, 'parent_id');
    }

    public function created_by_data()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updated_by_data()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
}
