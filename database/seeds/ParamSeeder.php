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

        Param::create([
            'category' => 'pph7',
            'param' => 'Penanggungan Biaya Pembinaan dan Pendampingan Usaha Mikro dalam Perizinan Usaha dan Bantuan Hukum.'
        ]);

        Param::create([
            'category' => 'pph7',
            'param' => '30 persen Infrastruktur Publik untuk tempat Pengembangan Usaha dan Tempat Promosi UMKM.'
        ]);

        Param::create([
            'category' => 'pph7',
            'param' => 'Kebijakan Implementasi Alokasi 40 persen Belanja Pengadaan Barang/ Jasa Pemerintah Bagi UMKM.'
        ]);

        Param::create([
            'category' => 'pph7',
            'param' => 'Penyelenggaraan Basis Data Tunggal.'
        ]);
        Param::create([
            'category' => 'pph7',
            'param' => 'Penyediaan Sistem Informasi UKM Ekspor atau Katalog Promosi Digital.'
        ]);

        Param::create([
            'category' => 'pph7',
            'param' => 'Pengembangan Wirausaha Muda Produktif.'
        ]);

        Param::create([
            'category' => 'pph7',
            'param' => 'Penyediaan Rumah Produksi Bersama dengan Model Bisnis dan Tata Kelola Koperasi.'
        ]);

        Param::create([
            'category' => 'pph7',
            'param' => 'Optimalisasi PLUT-KUMKM Sebagai Pusat Promosi dan Kreatif Hub.'
        ]);

        Param::create([
            'category' => 'pph7',
            'param' => 'Kemitraan Strategis UMKM masuk dalam Rantai Pasok Berbasis Koperasi Modern.'
        ]);
        
        Param::create([
            'category' => 'pph7',
            'param' => 'Penyediaan Pusat Kuliner dan Oleh Oleh di Kawasan Wisata.'
        ]);

        Param::create([
            'category' => 'pph7',
            'param' => 'Peningkatan dan Perluasan Akses Pembiayaan Bagi Koperasi dan UMKM.'
        ]);
    }
}
