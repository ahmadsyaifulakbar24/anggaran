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

        Param::create([
            'category' => 'target',
            'param' => 'Kontribusi Koperasi, UMKM, dan Kewirausahaan yang Produktif, Mandiri, dan Berdaya Saing Dalam Mendukung Perekonomian Nasional.'
        ]);

        Param::create([
            'category' => 'indicator',
            'param' => 'Kontribusi Koperasi terhadap PDB.'
        ]);

        Param::create([
            'category' => 'indicator',
            'param' => 'Kontribusi UMKM terhadap PDB.'
        ]);

        Param::create([
            'category' => 'indicator',
            'param' => 'Rasio Kewirausahaan Nasional.'
        ]);

        Param::create([
            'category' => 'sources_of_funding',
            'param' => 'RM'
        ]);
        
        Param::create([
            'category' => 'sources_of_funding',
            'param' => 'BLU'
        ]);
    }
}
