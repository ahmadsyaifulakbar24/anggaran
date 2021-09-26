<?php

use App\Models\UnitTarget;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitTargetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UnitTarget::create([ 'name' => 'Layanan' ]);
        UnitTarget::create([ 'name' => 'Koperasi' ]);
        UnitTarget::create([ 'name' => 'Paket' ]);
        UnitTarget::create([ 'name' => 'Unit' ]);
    }
}
