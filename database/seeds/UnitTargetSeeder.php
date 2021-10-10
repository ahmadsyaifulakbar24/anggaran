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
        UnitTarget::create([ 'name' => 'Dokumen' ]);
        UnitTarget::create([ 'name' => 'Kegiatan' ]);
        UnitTarget::create([ 'name' => 'Kebijakan' ]);
        UnitTarget::create([ 'name' => 'Koperasi' ]);
        UnitTarget::create([ 'name' => 'Lembaga' ]);
        UnitTarget::create([ 'name' => 'Rancangan Peraturan' ]);
        UnitTarget::create([ 'name' => 'Kesepakatan' ]);
        UnitTarget::create([ 'name' => 'Provinsi' ]);
        UnitTarget::create([ 'name' => 'Laporan' ]);
        UnitTarget::create([ 'name' => 'Layanan' ]);
        UnitTarget::create([ 'name' => 'Bulan' ]);
        UnitTarget::create([ 'name' => 'Tahun' ]);
        UnitTarget::create([ 'name' => 'Kelompok' ]);
        UnitTarget::create([ 'name' => 'Kelompok Masyarakat' ]);
        UnitTarget::create([ 'name' => 'Orang' ]);
        UnitTarget::create([ 'name' => 'Rekomendasi Kebijakan' ]);
        UnitTarget::create([ 'name' => 'Unit' ]);
        UnitTarget::create([ 'name' => 'PerMen' ]);
        UnitTarget::create([ 'name' => 'Sistem Informasi' ]);
        UnitTarget::create([ 'name' => 'Undang-Undang' ]);
        UnitTarget::create([ 'name' => 'Daerah' ]);
        UnitTarget::create([ 'name' => 'Usaha Mikro' ]);
        UnitTarget::create([ 'name' => 'UKM' ]);
        UnitTarget::create([ 'name' => 'Pelaku Usaha' ]);
        UnitTarget::create([ 'name' => 'Start-Up' ]);
        UnitTarget::create([ 'name' => 'Wirausaha' ]);
        UnitTarget::create([ 'name' => 'Paket' ]);
        UnitTarget::create([ 'name' => 'Promosi' ]);
        UnitTarget::create([ 'name' => 'Kali' ]);
    }
}
