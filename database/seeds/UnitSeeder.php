<?php

use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'username' => 'admin',
            'name' => 'Admin',
            'unit_id' => null,
            'password' => Hash::make('12345678'),
        ]);
        $admin->assignRole('admin');
        
        $perkoperasian = Unit::create([ 'name' => 'Deputi Bidang Perkoperasian' ]);
        $user_perkoperasian = $perkoperasian->user()->create([
            'username' => 'perkoperasian',
            'name' => 'Deputi Bidang Perkoperasian',
            'parent_id' => $admin->id,
            'password' => Hash::make('12345678'),
        ]);
        $user_perkoperasian->assignRole('deputi');

        $usaha_mikro = Unit::create([ 'name' => 'Deputi Bidang Usaha Mikro' ]);
        $user_usaha_mikro = $usaha_mikro->user()->create([
            'username' => 'usaha_mikro',
            'name' => 'Deputi Bidang Usaha Mikro',
            'parent_id' => $admin->id,
            'password' => Hash::make('12345678'),
        ]);
        $user_usaha_mikro->assignRole('deputi');

        $ukm = Unit::create([ 'name' => 'Deputi Bidang UKM' ]);
        $user_ukm = $ukm->user()->create([
            'username' => 'ukm',
            'name' => 'Deputi Bidang UKM',
            'parent_id' => $admin->id,
            'password' => Hash::make('12345678'),
        ]);
        $user_ukm->assignRole('deputi');

        $kewirausahaan = Unit::create([ 'name' => 'Deputi Bidang Kewirausahaan' ]);
        $user_kewirausahaan = $kewirausahaan->user()->create([
            'username' => 'kewirausahaan',
            'name' => 'Deputi Bidang Kewirausahaan',
            'parent_id' => $admin->id,
            'password' => Hash::make('12345678'),
        ]);
        $user_kewirausahaan->assignRole('deputi');

        $kemenkop_ukm = Unit::create([ 'name' => 'Sekretariat Kemenkop UKM' ]);
        $user_kemenkop_ukm = $kemenkop_ukm->user()->create([
            'username' => 'kemenkop_ukm',
            'name' => 'Sekertarian Kemenkop UKM',
            'parent_id' => $admin->id,
            'password' => Hash::make('12345678'),
        ]);
        $user_kemenkop_ukm->assignRole('deputi');

        $lpdb = Unit::create([ 'name' => 'LPDB KUMKM (Lembaga Pengelola Dana Bergulir)' ]);
        $user_lpdb = $lpdb->user()->create([
            'username' => 'lpdb',
            'name' => 'LPDB KUKM (Lembaga Pengelola Dana Bergulir)',
            'parent_id' => $admin->id,
            'password' => Hash::make('12345678'),
        ]);
        $user_lpdb->assignRole('deputi');

        $llp = Unit::create([ 'name' => 'LLP-KUKM (Lembaga Layanan Pemasaran)' ]);
        $user_llp = $llp->user()->create([
            'username' => 'llp',
            'name' => 'LLP-KUKM (Lembaga Layanan Pemesanan)',
            'parent_id' => $admin->id,
            'password' => Hash::make('12345678'),
        ]);
        $user_llp->assignRole('deputi');
    }
}
