<?php

use App\Models\Param;
use Illuminate\Database\Seeder;

class ParamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Param::create([
            'category' => 'file_type',
            'param' => 'TOR'
        ]);

        Param::create([
            'category' => 'file_type',
            'param' => 'RAB'
        ]);

        Param::create([
            'category' => 'file_type',
            'param' => 'Lainnya'
        ]);
    }
}
