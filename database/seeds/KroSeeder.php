<?php

use App\Models\Kro;
use Illuminate\Database\Seeder;

class KroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kro::create([
            'id' => 1,
            'code_kro_non_pn' => 'AAA',
            'code_kro_pn' => 'PAA',
            'kro' => 'Undang-Undang',
            'unit' => 'UU'
        ]);

        Kro::create([
            'id' => 2,
            'code_kro_non_pn' => 'AAB',
            'code_kro_pn' => 'PAB',
            'kro' => 'Peraturan Pemerintah Pengganti Undang-Undang',
            'unit' => 'Perppu'
        ]);

        Kro::create([
            'id' => 3,
            'code_kro_non_pn' => 'AAC',
            'code_kro_pn' => 'PAC',
            'kro' => 'Peraturan Pemerintah',
            'unit' => 'PP'
        ]);

        Kro::create([
            'id' => 4,
            'code_kro_non_pn' => 'AAD',
            'code_kro_pn' => 'PAD',
            'kro' => 'Peraturan Presiden',
            'unit' => 'PerPres'
        ]);

        Kro::create([
            'id' => 5,
            'code_kro_non_pn' => 'AAE',
            'code_kro_pn' => 'PAE',
            'kro' => 'Keputusan Presiden',
            'unit' => 'KepPres'
        ]);

        Kro::create([
            'id' => 6,
            'code_kro_non_pn' => 'AAF',
            'code_kro_pn' => 'PAF',
            'kro' => 'Instruksi Presiden',
            'unit' => 'Inpres'
        ]);

        Kro::create([
            'id' => 7,
            'code_kro_non_pn' => 'AAG',
            'code_kro_pn' => 'PAG',
            'kro' => 'Peraturan Menteri',
            'unit' => 'PerMen'
        ]);

        Kro::create([
            'id' => 8,
            'code_kro_non_pn' => 'AAH',
            'code_kro_pn' => 'PAH',
            'kro' => 'Peraturan lainnya',
            'unit' => 'Peraturan'
        ]);

        Kro::create([
            'id' => 9,
            'code_kro_non_pn' => 'ABA',
            'code_kro_pn' => 'PBA',
            'kro' => 'Kebijakan Bidang Ekonomi dan Keuangan',
            'unit' => 'Rekomendasi\nKebijakan'
        ]);

        Kro::create([
            'id' => 10,
            'code_kro_non_pn' => 'ABB',
            'code_kro_pn' => 'PBB',
            'kro' => 'Kebijakan Bidang Investasi dan Perdagangan',
            'unit' => 'Rekomendasi\nKebijakan'
        ]);

        Kro::create([
            'id' => 11,
            'code_kro_non_pn' => 'ABC',
            'code_kro_pn' => 'PBC',
            'kro' => 'Kebijakan Bidang Politik',
            'unit' => 'Rekomendasi\nKebijakan'
        ]);

        Kro::create([
            'id' => 12,
            'code_kro_non_pn' => 'ABD',
            'code_kro_pn' => 'PBD',
            'kro' => 'Kebijakan Bidang Hukum dan HAM',
            'unit' => 'Rekomendasi\nKebijakan'
        ]);

        Kro::create([
            'id' => 13,
            'code_kro_non_pn' => 'ABE',
            'code_kro_pn' => 'PBE',
            'kro' => 'Kebijakan Bidang Pertahanan dan Keamanan',
            'unit' => 'Rekomendasi\nKebijakan'
        ]);

        Kro::create([
            'id' => 14,
            'code_kro_non_pn' => 'ABF',
            'code_kro_pn' => 'PBF',
            'kro' => 'Kebijakan Bidang Sarana dan Prasarana',
            'unit' => 'Rekomendasi\nKebijakan'
        ]);

        Kro::create([
            'id' => 15,
            'code_kro_non_pn' => 'ABG',
            'code_kro_pn' => 'PBG',
            'kro' => 'Kebijakan Bidang Kesehatan',
            'unit' => 'Rekomendasi\nKebijakan'
        ]);

        Kro::create([
            'id' => 16,
            'code_kro_non_pn' => 'ABH',
            'code_kro_pn' => 'PBH',
            'kro' => 'Kebijakan Bidang IPTEK, Pendidikan dan Kebudayaan',
            'unit' => 'Rekomendasi\nKebijakan'
        ]);

        Kro::create([
            'id' => 17,
            'code_kro_non_pn' => 'ABI',
            'code_kro_pn' => 'PBI',
            'kro' => 'Kebijakan Bidang Energi dan Sumber Daya Alam',
            'unit' => 'Rekomendasi\nKebijakan'
        ]);

        Kro::create([
            'id' => 18,
            'code_kro_non_pn' => 'ABJ',
            'code_kro_pn' => 'PBJ',
            'kro' => 'Kebijakan Bidang Lingkungan Hidup',
            'unit' => 'Rekomendasi\nKebijakan'
        ]);

        Kro::create([
            'id' => 19,
            'code_kro_non_pn' => 'ABK',
            'code_kro_pn' => 'PBK',
            'kro' => 'Kebijakan Bidang Tenaga Kerja, Industri dan UMKM',
            'unit' => 'Rekomendasi\nKebijakan'
        ]);

        Kro::create([
            'id' => 20,
            'code_kro_non_pn' => 'ABL',
            'code_kro_pn' => 'PBL',
            'kro' => 'Kebijakan Bidang Tata Kelola Pemerintahan',
            'unit' => 'Rekomendasi\nKebijakan'
        ]);

        Kro::create([
            'id' => 21,
            'code_kro_non_pn' => 'ABM',
            'code_kro_pn' => 'PBM',
            'kro' => 'Kebijakan Bidang Pelayanan Publik',
            'unit' => 'Rekomendasi\nKebijakan'
        ]);

        Kro::create([
            'id' => 22,
            'code_kro_non_pn' => 'ABN',
            'code_kro_pn' => 'PBN',
            'kro' => 'Kebijakan Bidang Sosial',
            'unit' => 'Rekomendasi\nKebijakan'
        ]);

        Kro::create([
            'id' => 23,
            'code_kro_non_pn' => 'ABO',
            'code_kro_pn' => 'PBO',
            'kro' => 'Kebijakan Bidang Teknologi Informasi',
            'unit' => 'Rekomendasi\nKebijakan'
        ]);

        Kro::create([
            'id' => 24,
            'code_kro_non_pn' => 'ABP',
            'code_kro_pn' => 'PBP',
            'kro' => 'Kebijakan Bidang Pengembangan Wilayah',
            'unit' => 'Rekomendasi\nKebijakan'
        ]);

        Kro::create([
            'id' => 25,
            'code_kro_non_pn' => 'ABQ',
            'code_kro_pn' => 'PBQ',
            'kro' => 'Kebijakan Bidang Aparatur',
            'unit' => 'Rekomendasi\nKebijakan'
        ]);

        Kro::create([
            'id' => 26,
            'code_kro_non_pn' => 'ABR',
            'code_kro_pn' => 'PBR',
            'kro' => 'Kebijakan Bidang Pertanian dan Perikanan',
            'unit' => 'Rekomendasi\nKebijakan'
        ]);

        Kro::create([
            'id' => 27,
            'code_kro_non_pn' => 'ABS',
            'code_kro_pn' => 'PBS',
            'kro' => 'Kebijakan Bidang Ketahanan bencana dan perubahan iklim',
            'unit' => 'Rekomendasi\nKebijakan'
        ]);

        Kro::create([
            'id' => 28,
            'code_kro_non_pn' => 'ABT',
            'code_kro_pn' => 'PBT',
            'kro' => 'Kebijakan Bidang Ruang dan Pertanahan',
            'unit' => 'Rekomendasi\nKebijakan'
        ]);

        Kro::create([
            'id' => 29,
            'code_kro_non_pn' => 'ABU',
            'code_kro_pn' => 'PBU',
            'kro' => 'Kebijakan Bidang Tenaga Nuklir',
            'unit' => 'Rekomendasi\nKebijakan'
        ]);

        Kro::create([
            'id' => 30,
            'code_kro_non_pn' => 'ABV',
            'code_kro_pn' => 'PBV',
            'kro' => 'Kebijakan Bidang Kehutanan',
            'unit' => 'Rekomendasi\nKebijakan'
        ]);

        Kro::create([
            'id' => 31,
            'code_kro_non_pn' => 'ABW',
            'code_kro_pn' => 'PBW',
            'kro' => 'Kebijakan Bidang Kemaritiman dan Kelautan',
            'unit' => 'Rekomendasi\nKebijakan'
        ]);

        Kro::create([
            'id' => 32,
            'code_kro_non_pn' => 'ACA',
            'code_kro_pn' => 'PCA',
            'kro' => 'Perizinan Produk',
            'unit' => 'Produk'
        ]);

        Kro::create([
            'id' => 33,
            'code_kro_non_pn' => 'ACB',
            'code_kro_pn' => 'PCB',
            'kro' => 'Perizinan Masyarakat',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 34,
            'code_kro_non_pn' => 'ACC',
            'code_kro_pn' => 'PCC',
            'kro' => 'Perizinan Kelompok Masyarakat',
            'unit' => 'Kelompok\nMasyarakat'
        ]);

        Kro::create([
            'id' => 35,
            'code_kro_non_pn' => 'ACD',
            'code_kro_pn' => 'PCD',
            'kro' => 'Perizinan Lembaga',
            'unit' => 'Institusi'
        ]);

        Kro::create([
            'id' => 36,
            'code_kro_non_pn' => 'ACE',
            'code_kro_pn' => 'PCE',
            'kro' => 'Perizinan Profesi',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 37,
            'code_kro_non_pn' => 'ADA',
            'code_kro_pn' => 'PDA',
            'kro' => 'Standarisasi Produk',
            'unit' => 'Produk'
        ]);

        Kro::create([
            'id' => 38,
            'code_kro_non_pn' => 'ADB',
            'code_kro_pn' => 'PDB',
            'kro' => 'Akreditasi Produk',
            'unit' => 'Produk'
        ]);

        Kro::create([
            'id' => 39,
            'code_kro_non_pn' => 'ADC',
            'code_kro_pn' => 'PDC',
            'kro' => 'Sertifikasi Produk',
            'unit' => 'Produk'
        ]);

        Kro::create([
            'id' => 40,
            'code_kro_non_pn' => 'ADD',
            'code_kro_pn' => 'PDD',
            'kro' => 'Standarisasi Lembaga',
            'unit' => 'Lembaga'
        ]);

        Kro::create([
            'id' => 41,
            'code_kro_non_pn' => 'ADE',
            'code_kro_pn' => 'PDE',
            'kro' => 'Akreditasi Lembaga',
            'unit' => 'Lembaga'
        ]);

        Kro::create([
            'id' => 42,
            'code_kro_non_pn' => 'ADF',
            'code_kro_pn' => 'PDF',
            'kro' => 'Sertifikasi Lembaga',
            'unit' => 'Lembaga'
        ]);

        Kro::create([
            'id' => 43,
            'code_kro_non_pn' => 'ADG',
            'code_kro_pn' => 'PDG',
            'kro' => 'Standarisasi Profesi dan SDM',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 44,
            'code_kro_non_pn' => 'ADH',
            'code_kro_pn' => 'PDH',
            'kro' => 'Akreditasi Profesi dan SDM',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 45,
            'code_kro_non_pn' => 'ADI',
            'code_kro_pn' => 'PDI',
            'kro' => 'Sertifikasi Profesi dan SDM',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 46,
            'code_kro_non_pn' => 'AEA',
            'code_kro_pn' => 'PEA',
            'kro' => 'Koordinasi',
            'unit' => 'kegiatan'
        ]);

        Kro::create([
            'id' => 47,
            'code_kro_non_pn' => 'AEB',
            'code_kro_pn' => 'PEB',
            'kro' => 'Forum',
            'unit' => 'forum'
        ]);

        Kro::create([
            'id' => 48,
            'code_kro_non_pn' => 'AEC',
            'code_kro_pn' => 'PEC',
            'kro' => 'Kerja sama',
            'unit' => 'Kesepakatan'
        ]);

        Kro::create([
            'id' => 49,
            'code_kro_non_pn' => 'AED',
            'code_kro_pn' => 'PED',
            'kro' => 'Perjanjian',
            'unit' => 'perjanjian'
        ]);

        Kro::create([
            'id' => 50,
            'code_kro_non_pn' => 'AEE',
            'code_kro_pn' => 'PEE',
            'kro' => 'Kemitraan',
            'unit' => 'Kesepakatan'
        ]);

        Kro::create([
            'id' => 51,
            'code_kro_non_pn' => 'AEF',
            'code_kro_pn' => 'PEF',
            'kro' => 'Sosialisasi dan Diseminasi',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 52,
            'code_kro_non_pn' => 'AEG',
            'code_kro_pn' => 'PEG',
            'kro' => 'Konferensi dan Event',
            'unit' => 'kegiatan'
        ]);

        Kro::create([
            'id' => 53,
            'code_kro_non_pn' => 'AEH',
            'code_kro_pn' => 'PEH',
            'kro' => 'Promosi',
            'unit' => 'promosi'
        ]);

        Kro::create([
            'id' => 54,
            'code_kro_non_pn' => 'AFA',
            'code_kro_pn' => 'PFA',
            'kro' => 'Norma, Standard, Prosedur dan Kriteria',
            'unit' => 'NSPK'
        ]);

        Kro::create([
            'id' => 55,
            'code_kro_non_pn' => 'BAA',
            'code_kro_pn' => 'QAA',
            'kro' => 'Pelayanan Publik kepada masyarakat',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 56,
            'code_kro_non_pn' => 'BAB',
            'code_kro_pn' => 'QAB',
            'kro' => 'Pelayanan Publik kepada  lembaga',
            'unit' => 'Lembaga'
        ]);

        Kro::create([
            'id' => 57,
            'code_kro_non_pn' => 'BAC',
            'code_kro_pn' => 'QAC',
            'kro' => 'Pelayanan Publik kepada  badan usaha',
            'unit' => 'Badan usaha'
        ]);

        Kro::create([
            'id' => 58,
            'code_kro_non_pn' => 'BAD',
            'code_kro_pn' => 'QAD',
            'kro' => 'Pelayanan Publik kepada  industri',
            'unit' => 'Industri'
        ]);

        Kro::create([
            'id' => 59,
            'code_kro_non_pn' => 'BAE',
            'code_kro_pn' => 'QAE',
            'kro' => 'Pelayanan Publik kepada  UMKM',
            'unit' => 'UMKM'
        ]);

        Kro::create([
            'id' => 60,
            'code_kro_non_pn' => 'BAF',
            'code_kro_pn' => 'QAF',
            'kro' => 'Pelayanan Publik kepada  Koperasi',
            'unit' => 'Koperasi'
        ]);

        Kro::create([
            'id' => 61,
            'code_kro_non_pn' => 'BAG',
            'code_kro_pn' => 'QAG',
            'kro' => 'Pelayanan Publik kepada  LSM',
            'unit' => 'LSM'
        ]);

        Kro::create([
            'id' => 62,
            'code_kro_non_pn' => 'BAH',
            'code_kro_pn' => 'QAH',
            'kro' => 'Pelayanan Publik Lainnya',
            'unit' => 'layanan'
        ]);

        Kro::create([
            'id' => 63,
            'code_kro_non_pn' => 'BBA',
            'code_kro_pn' => 'QBA',
            'kro' => 'Layanan Bantuan Hukum Perseorangan',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 64,
            'code_kro_non_pn' => 'BBB',
            'code_kro_pn' => 'QBB',
            'kro' => 'Layanan Bantuan Hukum Lembaga',
            'unit' => 'Institusi'
        ]);

        Kro::create([
            'id' => 65,
            'code_kro_non_pn' => 'BBC',
            'code_kro_pn' => 'QBC',
            'kro' => 'Layanan Bantuan Hukum Kelompok Masyarakat',
            'unit' => 'Kelompok\nMasyarakat'
        ]);

        Kro::create([
            'id' => 66,
            'code_kro_non_pn' => 'BBD',
            'code_kro_pn' => 'QBD',
            'kro' => 'Layanan Bantuan Hukum Badan Usaha',
            'unit' => 'Badan usaha'
        ]);

        Kro::create([
            'id' => 67,
            'code_kro_non_pn' => 'BCA',
            'code_kro_pn' => 'QCA',
            'kro' => 'Perkara Hukum Perseorangan',
            'unit' => 'Perkara'
        ]);

        Kro::create([
            'id' => 68,
            'code_kro_non_pn' => 'BCB',
            'code_kro_pn' => 'QCB',
            'kro' => 'Perkara Hukum Lembaga',
            'unit' => 'Perkara'
        ]);

        Kro::create([
            'id' => 69,
            'code_kro_non_pn' => 'BCC',
            'code_kro_pn' => 'QCC',
            'kro' => 'Perkara Hukum Kelompok Masyarakat',
            'unit' => 'Perkara'
        ]);

        Kro::create([
            'id' => 70,
            'code_kro_non_pn' => 'BCD',
            'code_kro_pn' => 'QCD',
            'kro' => 'Perkara Hukum Badan Usaha',
            'unit' => 'Perkara'
        ]);

        Kro::create([
            'id' => 71,
            'code_kro_non_pn' => 'BCE',
            'code_kro_pn' => 'QCE',
            'kro' => 'Penanganan Perkara',
            'unit' => 'Perkara'
        ]);

        Kro::create([
            'id' => 72,
            'code_kro_non_pn' => 'BDA',
            'code_kro_pn' => 'QDA',
            'kro' => 'Fasilitasi dan Pembinaan BUMN',
            'unit' => 'BUMN'
        ]);

        Kro::create([
            'id' => 73,
            'code_kro_non_pn' => 'BDB',
            'code_kro_pn' => 'QDB',
            'kro' => 'Fasilitasi dan Pembinaan Lembaga',
            'unit' => 'Lembaga'
        ]);

        Kro::create([
            'id' => 74,
            'code_kro_non_pn' => 'BDC',
            'code_kro_pn' => 'QDC',
            'kro' => 'Fasilitasi dan Pembinaan Masyarakat',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 75,
            'code_kro_non_pn' => 'BDD',
            'code_kro_pn' => 'QDD',
            'kro' => 'Fasilitasi dan Pembinaan Kelompok Masyarakat',
            'unit' => 'Kelompok\nMasyarakat'
        ]);

        Kro::create([
            'id' => 76,
            'code_kro_non_pn' => 'BDE',
            'code_kro_pn' => 'QDE',
            'kro' => 'Fasilitasi dan Pembinaan Keluarga',
            'unit' => 'Keluarga'
        ]);

        Kro::create([
            'id' => 77,
            'code_kro_non_pn' => 'BDF',
            'code_kro_pn' => 'QDF',
            'kro' => 'Fasilitasi dan Pembinaan Koperasi',
            'unit' => 'Koperasi'
        ]);

        Kro::create([
            'id' => 78,
            'code_kro_non_pn' => 'BDG',
            'code_kro_pn' => 'QDG',
            'kro' => 'Fasilitasi dan Pembinaan UMKM',
            'unit' => 'UMKM'
        ]);

        Kro::create([
            'id' => 79,
            'code_kro_non_pn' => 'BDH',
            'code_kro_pn' => 'QDH',
            'kro' => 'Fasilitasi dan Pembinaan Badan Usaha',
            'unit' => 'Badan usaha'
        ]);

        Kro::create([
            'id' => 80,
            'code_kro_non_pn' => 'BDI',
            'code_kro_pn' => 'QDI',
            'kro' => 'Fasilitasi dan Pembinaan Industri',
            'unit' => 'Industri'
        ]);

        Kro::create([
            'id' => 81,
            'code_kro_non_pn' => 'BDJ',
            'code_kro_pn' => 'QDJ',
            'kro' => 'Fasilitasi dan Pembinaan Start up',
            'unit' => 'Start up'
        ]);

        Kro::create([
            'id' => 82,
            'code_kro_non_pn' => 'BEA',
            'code_kro_pn' => 'QEA',
            'kro' => 'Bantuan Masyarakat',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 83,
            'code_kro_non_pn' => 'BEB',
            'code_kro_pn' => 'QEB',
            'kro' => 'Bantuan Keluarga',
            'unit' => 'Keluarga'
        ]);

        Kro::create([
            'id' => 84,
            'code_kro_non_pn' => 'BEC',
            'code_kro_pn' => 'QEC',
            'kro' => 'Bantuan Produk',
            'unit' => 'Paket'
        ]);

        Kro::create([
            'id' => 85,
            'code_kro_non_pn' => 'BED',
            'code_kro_pn' => 'QED',
            'kro' => 'Bantuan Tanaman',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 86,
            'code_kro_non_pn' => 'BEE',
            'code_kro_pn' => 'QEE',
            'kro' => 'Bantuan Kebencanaan',
            'unit' => 'Paket'
        ]);

        Kro::create([
            'id' => 87,
            'code_kro_non_pn' => 'BEF',
            'code_kro_pn' => 'QEF',
            'kro' => 'Bantuan Luar Negeri',
            'unit' => 'kegiatan'
        ]);

        Kro::create([
            'id' => 88,
            'code_kro_non_pn' => 'BEG',
            'code_kro_pn' => 'QEG',
            'kro' => 'Bantuan Peralatan / Sarana',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 89,
            'code_kro_non_pn' => 'BEH',
            'code_kro_pn' => 'QEH',
            'kro' => 'Bantuan Kelompok Masyarakat',
            'unit' => 'Kelompok\nMasyarakat'
        ]);

        Kro::create([
            'id' => 90,
            'code_kro_non_pn' => 'BEI',
            'code_kro_pn' => 'QEI',
            'kro' => 'Bantuan Lembaga',
            'unit' => 'Lembaga'
        ]);

        Kro::create([
            'id' => 91,
            'code_kro_non_pn' => 'BEJ',
            'code_kro_pn' => 'QEJ',
            'kro' => 'Bantuan Pendidikan Tinggi',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 92,
            'code_kro_non_pn' => 'BEK',
            'code_kro_pn' => 'QEK',
            'kro' => 'Bantuan Pendidikan Dasar dan Menengah',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 93,
            'code_kro_non_pn' => 'BEL',
            'code_kro_pn' => 'QEL',
            'kro' => 'Bantuan Hewan',
            'unit' => 'Ekor'
        ]);

        Kro::create([
            'id' => 94,
            'code_kro_non_pn' => 'BEM',
            'code_kro_pn' => 'QEM',
            'kro' => 'Bantuan Pelaku Usaha',
            'unit' => 'Pelaku Usaha'
        ]);

        Kro::create([
            'id' => 95,
            'code_kro_non_pn' => 'BFA',
            'code_kro_pn' => 'QFA',
            'kro' => 'Subsidi kepada Masyarakat',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 96,
            'code_kro_non_pn' => 'BFB',
            'code_kro_pn' => 'QFB',
            'kro' => 'Subsidi kepada Lembaga',
            'unit' => 'Lembaga'
        ]);

        Kro::create([
            'id' => 97,
            'code_kro_non_pn' => 'BFC',
            'code_kro_pn' => 'QFC',
            'kro' => 'Subsidi Kepada Keluarga',
            'unit' => 'Rumah Tangga'
        ]);

        Kro::create([
            'id' => 98,
            'code_kro_non_pn' => 'BGA',
            'code_kro_pn' => 'QGA',
            'kro' => 'Tata Kelola Kelembagaan Publik Bidang Ekonomi',
            'unit' => 'Lembaga'
        ]);

        Kro::create([
            'id' => 99,
            'code_kro_non_pn' => 'BGB',
            'code_kro_pn' => 'QGB',
            'kro' => 'Tata Kelola Kelembagaan Publik Bidang Sosial dan Budaya',
            'unit' => 'Lembaga'
        ]);

        Kro::create([
            'id' => 100,
            'code_kro_non_pn' => 'BGC',
            'code_kro_pn' => 'QGC',
            'kro' => 'Tata Kelola Kelembagaan Publik Bidang Pendidikan',
            'unit' => 'Lembaga'
        ]);

        Kro::create([
            'id' => 101,
            'code_kro_non_pn' => 'BGD',
            'code_kro_pn' => 'QGD',
            'kro' => 'Tata Kelola Kelembagaan Publik Bidang Kesehatan',
            'unit' => 'Lembaga'
        ]);

        Kro::create([
            'id' => 102,
            'code_kro_non_pn' => 'BGE',
            'code_kro_pn' => 'QGE',
            'kro' => 'Tata Kelola Kelembagaan Publik Bidang Politik dan Hukum',
            'unit' => 'Lembaga'
        ]);

        Kro::create([
            'id' => 103,
            'code_kro_non_pn' => 'BGF',
            'code_kro_pn' => 'QGF',
            'kro' => 'Tata Kelola Kelembagaan Publik Bidang Pertahanan dan Keamanan',
            'unit' => 'Lembaga'
        ]);

        Kro::create([
            'id' => 104,
            'code_kro_non_pn' => 'BHA',
            'code_kro_pn' => 'QHA',
            'kro' => 'Operasi Bidang Pertahanan',
            'unit' => 'operasi'
        ]);

        Kro::create([
            'id' => 105,
            'code_kro_non_pn' => 'BHB',
            'code_kro_pn' => 'QHB',
            'kro' => 'Operasi Bidang Keamanan',
            'unit' => 'operasi'
        ]);

        Kro::create([
            'id' => 106,
            'code_kro_non_pn' => 'BHC',
            'code_kro_pn' => 'QHC',
            'kro' => 'Operasi Bidang Pencarian, Pertolongan, dan Penanganan Bencana',
            'unit' => 'operasi'
        ]);

        Kro::create([
            'id' => 107,
            'code_kro_non_pn' => 'BHD',
            'code_kro_pn' => 'QHD',
            'kro' => 'Operasi Pengawasan Sumber Daya Alam',
            'unit' => 'operasi'
        ]);

        Kro::create([
            'id' => 108,
            'code_kro_non_pn' => 'BIA',
            'code_kro_pn' => 'QIA',
            'kro' => 'Pengawasan dan Pengendalian Produk',
            'unit' => 'Produk'
        ]);

        Kro::create([
            'id' => 109,
            'code_kro_non_pn' => 'BIB',
            'code_kro_pn' => 'QIB',
            'kro' => 'Pengawasan dan Pengendalian Masyarakat',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 110,
            'code_kro_non_pn' => 'BIC',
            'code_kro_pn' => 'QIC',
            'kro' => 'Pengawasan dan Pengendalian Lembaga',
            'unit' => 'Lembaga'
        ]);

        Kro::create([
            'id' => 111,
            'code_kro_non_pn' => 'BID',
            'code_kro_pn' => 'QID',
            'kro' => 'Pengawasan dan Pengendalian Kelompok Masyarakat',
            'unit' => 'Kelompok\nMasyarakat'
        ]);

        Kro::create([
            'id' => 112,
            'code_kro_non_pn' => 'BIE',
            'code_kro_pn' => 'QIE',
            'kro' => 'Pengawasan dan Pengendalian Pemerintah Daerah',
            'unit' => 'Pemerintah\nDaerah'
        ]);

        Kro::create([
            'id' => 113,
            'code_kro_non_pn' => 'BIF',
            'code_kro_pn' => 'QIF',
            'kro' => 'Pengawasan dan Pengendalian Layanan',
            'unit' => 'Layanan'
        ]);

        Kro::create([
            'id' => 114,
            'code_kro_non_pn' => 'BIG',
            'code_kro_pn' => 'QIG',
            'kro' => 'Pemeriksaan dan Audit Penerimaan',
            'unit' => 'Laporan'
        ]);

        Kro::create([
            'id' => 115,
            'code_kro_non_pn' => 'BIH',
            'code_kro_pn' => 'QIH',
            'kro' => 'Pengawasan dan Pengendalian Badan Usaha',
            'unit' => 'Badan Usaha'
        ]);

        Kro::create([
            'id' => 116,
            'code_kro_non_pn' => 'BII',
            'code_kro_pn' => 'QII',
            'kro' => 'Pengawasan dan Pengendalian Lingkungan',
            'unit' => 'Hektar'
        ]);

        Kro::create([
            'id' => 117,
            'code_kro_non_pn' => 'BJA',
            'code_kro_pn' => 'QJA',
            'kro' => 'Penyidikan dan Pengujian Produk',
            'unit' => 'Produk'
        ]);

        Kro::create([
            'id' => 118,
            'code_kro_non_pn' => 'BJB',
            'code_kro_pn' => 'QJB',
            'kro' => 'Penyidikan dan Pengujian Peralatan',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 119,
            'code_kro_non_pn' => 'BJC',
            'code_kro_pn' => 'QJC',
            'kro' => 'Penyidikan dan Pengujian Penyakit',
            'unit' => 'Sampel'
        ]);

        Kro::create([
            'id' => 120,
            'code_kro_non_pn' => 'BKA',
            'code_kro_pn' => 'QKA',
            'kro' => 'Pemantauan masyarakat dan kelompok masyarakat',
            'unit' => 'laporan'
        ]);

        Kro::create([
            'id' => 121,
            'code_kro_non_pn' => 'BKB',
            'code_kro_pn' => 'QKB',
            'kro' => 'Pemantauan produk',
            'unit' => 'laporan'
        ]);

        Kro::create([
            'id' => 122,
            'code_kro_non_pn' => 'BKC',
            'code_kro_pn' => 'QKC',
            'kro' => 'Pemantauan lembaga',
            'unit' => 'laporan'
        ]);

        Kro::create([
            'id' => 123,
            'code_kro_non_pn' => 'BLA',
            'code_kro_pn' => 'QLA',
            'kro' => 'Persidangan Lembaga Legislatif',
            'unit' => 'sidang'
        ]);

        Kro::create([
            'id' => 124,
            'code_kro_non_pn' => 'BLB',
            'code_kro_pn' => 'QLB',
            'kro' => 'Persidangan Lembaga Eksekutif',
            'unit' => 'sidang'
        ]);

        Kro::create([
            'id' => 125,
            'code_kro_non_pn' => 'BLC',
            'code_kro_pn' => 'QLC',
            'kro' => 'Persidangan Lembaga Yudikatif',
            'unit' => 'sidang'
        ]);

        Kro::create([
            'id' => 126,
            'code_kro_non_pn' => 'BMA',
            'code_kro_pn' => 'QMA',
            'kro' => 'Data dan Informasi Publik',
            'unit' => 'layanan'
        ]);

        Kro::create([
            'id' => 127,
            'code_kro_non_pn' => 'BMB',
            'code_kro_pn' => 'QMB',
            'kro' => 'Komunikasi Publik',
            'unit' => 'layanan'
        ]);

        Kro::create([
            'id' => 128,
            'code_kro_non_pn' => 'CAA',
            'code_kro_pn' => 'RAA',
            'kro' => 'Sarana Bidang Pendidikan',
            'unit' => 'Paket'
        ]);

        Kro::create([
            'id' => 129,
            'code_kro_non_pn' => 'CAB',
            'code_kro_pn' => 'RAB',
            'kro' => 'Sarana Bidang Kesehatan',
            'unit' => 'Paket'
        ]);

        Kro::create([
            'id' => 130,
            'code_kro_non_pn' => 'CAC',
            'code_kro_pn' => 'RAC',
            'kro' => 'Sarana Bidang Konektivitas Darat',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 131,
            'code_kro_non_pn' => 'CAD',
            'code_kro_pn' => 'RAD',
            'kro' => 'Sarana Bidang Konektivitas Udara',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 132,
            'code_kro_non_pn' => 'CAE',
            'code_kro_pn' => 'RAE',
            'kro' => 'Sarana Bidang Konektivitas Laut',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 133,
            'code_kro_non_pn' => 'CAF',
            'code_kro_pn' => 'RAF',
            'kro' => 'Sarana Bidang Pertahanan dan Keamanan',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 134,
            'code_kro_non_pn' => 'CAG',
            'code_kro_pn' => 'RAG',
            'kro' => 'Sarana Bidang Pertanian, Kehutanan dan Lingkungan Hidup',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 135,
            'code_kro_non_pn' => 'CAH',
            'code_kro_pn' => 'RAH',
            'kro' => 'Sarana Bidang Industri dan Perdagangan',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 136,
            'code_kro_non_pn' => 'CAI',
            'code_kro_pn' => 'RAI',
            'kro' => 'Sarana Pengembangan Kawasan',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 137,
            'code_kro_non_pn' => 'CAJ',
            'code_kro_pn' => 'RAJ',
            'kro' => 'Sarana Bidang Ketenagakerjaan',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 138,
            'code_kro_non_pn' => 'CAK',
            'code_kro_pn' => 'RAK',
            'kro' => 'Sarana Bidang Konektivitas Perkeretaapian',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 139,
            'code_kro_non_pn' => 'CAL',
            'code_kro_pn' => 'RAL',
            'kro' => 'Sarana Bidang Kemaritiman, Kelautan, dan Perikanan',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 140,
            'code_kro_non_pn' => 'CAM',
            'code_kro_pn' => 'RAM',
            'kro' => 'Sarana Bidang Pariwisata, Ekonomi Kreatif dan Kebudayaan',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 141,
            'code_kro_non_pn' => 'CAN',
            'code_kro_pn' => 'RAN',
            'kro' => 'Sarana Bidang Teknologi Informasi dan Komunikasi',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 142,
            'code_kro_non_pn' => 'CAO',
            'code_kro_pn' => 'RAO',
            'kro' => 'Sarana Bidang IPTEK',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 143,
            'code_kro_non_pn' => 'CAP',
            'code_kro_pn' => 'RAP',
            'kro' => 'Sarana Bidang Pencarian, Pertolongan, dan Penanganan Bencana',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 144,
            'code_kro_non_pn' => 'CBA',
            'code_kro_pn' => 'RBA',
            'kro' => 'Prasarana Bidang Konektivitas Perkeretaapian',
            'unit' => 'km'
        ]);

        Kro::create([
            'id' => 145,
            'code_kro_non_pn' => 'CBB',
            'code_kro_pn' => 'RBB',
            'kro' => 'Prasarana Bidang Perumahan dan Pemukiman',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 146,
            'code_kro_non_pn' => 'CBC',
            'code_kro_pn' => 'RBC',
            'kro' => 'Prasarana Bidang Konektivitas Darat (Jalan)',
            'unit' => 'km'
        ]);

        Kro::create([
            'id' => 147,
            'code_kro_non_pn' => 'CBD',
            'code_kro_pn' => 'RBD',
            'kro' => 'Prasarana Bidang Konektivitas Laut',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 148,
            'code_kro_non_pn' => 'CBE',
            'code_kro_pn' => 'RBE',
            'kro' => 'Prasarana Bidang Konektivitas Udara',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 149,
            'code_kro_non_pn' => 'CBF',
            'code_kro_pn' => 'RBF',
            'kro' => 'Prasarana Bidang Konektivitas Darat (Jembatan)',
            'unit' => 'm'
        ]);

        Kro::create([
            'id' => 150,
            'code_kro_non_pn' => 'CBG',
            'code_kro_pn' => 'RBG',
            'kro' => 'Prasarana Bidang SDA dan Irigasi',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 151,
            'code_kro_non_pn' => 'CBH',
            'code_kro_pn' => 'RBH',
            'kro' => 'Prasarana Bidang Pencarian, Pertolongan, dan Penanganan Bencana',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 152,
            'code_kro_non_pn' => 'CBI',
            'code_kro_pn' => 'RBI',
            'kro' => 'Prasarana Bidang Pendidikan Dasar dan Menengah',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 153,
            'code_kro_non_pn' => 'CBJ',
            'code_kro_pn' => 'RBJ',
            'kro' => 'Prasarana Bidang Pendidikan Tinggi',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 154,
            'code_kro_non_pn' => 'CBK',
            'code_kro_pn' => 'RBK',
            'kro' => 'Prasarana Bidang Pertanian, Kehutanan dan Lingkungan Hidup',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 155,
            'code_kro_non_pn' => 'CBL',
            'code_kro_pn' => 'RBL',
            'kro' => 'Prasarana Bidang Industri dan Perdagangan',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 156,
            'code_kro_non_pn' => 'CBM',
            'code_kro_pn' => 'RBM',
            'kro' => 'Prasarana Bidang Pertahanan dan Keamanan',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 157,
            'code_kro_non_pn' => 'CBN',
            'code_kro_pn' => 'RBN',
            'kro' => 'Prasarana Bidang Pariwisata dan Kebudayaan',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 158,
            'code_kro_non_pn' => 'CBO',
            'code_kro_pn' => 'RBO',
            'kro' => 'Prasarana Pengembangan Kawasan',
            'unit' => 'km2'
        ]);

        Kro::create([
            'id' => 159,
            'code_kro_non_pn' => 'CBP',
            'code_kro_pn' => 'RBP',
            'kro' => 'Prasarana Bidang Konektivitas Darat',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 160,
            'code_kro_non_pn' => 'CBQ',
            'code_kro_pn' => 'RBQ',
            'kro' => 'Prasarana Bidang Kemaritiman, Kelautan, dan Perikanan',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 161,
            'code_kro_non_pn' => 'CBR',
            'code_kro_pn' => 'RBR',
            'kro' => 'Dukungan Teknis',
            'unit' => 'Dokumen'
        ]);

        Kro::create([
            'id' => 162,
            'code_kro_non_pn' => 'CBS',
            'code_kro_pn' => 'RBS',
            'kro' => 'Prasarana Jaringan Sumber  Daya Air',
            'unit' => 'Km'
        ]);

        Kro::create([
            'id' => 163,
            'code_kro_non_pn' => 'CBT',
            'code_kro_pn' => 'RBT',
            'kro' => 'Prasarana Bidang Teknologi Informasi dan Komunikasi',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 164,
            'code_kro_non_pn' => 'CBU',
            'code_kro_pn' => 'RBU',
            'kro' => 'Prasarana Bidang IPTEK',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 165,
            'code_kro_non_pn' => 'CBV',
            'code_kro_pn' => 'RBV',
            'kro' => 'Prasarana Bidang Kesehatan',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 166,
            'code_kro_non_pn' => 'CCA',
            'code_kro_pn' => 'RCA',
            'kro' => 'OM Sarana Bidang Pendidikan',
            'unit' => 'Paket'
        ]);

        Kro::create([
            'id' => 167,
            'code_kro_non_pn' => 'CCB',
            'code_kro_pn' => 'RCB',
            'kro' => 'OM Sarana Bidang Kesehatan',
            'unit' => 'Paket'
        ]);

        Kro::create([
            'id' => 168,
            'code_kro_non_pn' => 'CCC',
            'code_kro_pn' => 'RCC',
            'kro' => 'OM Sarana Bidang Konektivitas Darat',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 169,
            'code_kro_non_pn' => 'CCD',
            'code_kro_pn' => 'RCD',
            'kro' => 'OM Sarana Bidang Konektivitas Udara',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 170,
            'code_kro_non_pn' => 'CCE',
            'code_kro_pn' => 'RCE',
            'kro' => 'OM Sarana Bidang Konektivitas Laut',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 171,
            'code_kro_non_pn' => 'CCF',
            'code_kro_pn' => 'RCF',
            'kro' => 'OM Sarana Bidang Pertahanan dan Keamanan',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 172,
            'code_kro_non_pn' => 'CCG',
            'code_kro_pn' => 'RCG',
            'kro' => 'OM Sarana Bidang Pertanian, Kehutanan dan Lingkungan Hidup',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 173,
            'code_kro_non_pn' => 'CCH',
            'code_kro_pn' => 'RCH',
            'kro' => 'OM Sarana Bidang Industri dan Perdagangan',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 174,
            'code_kro_non_pn' => 'CCI',
            'code_kro_pn' => 'RCI',
            'kro' => 'OM Sarana Pengembangan Kawasan',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 175,
            'code_kro_non_pn' => 'CCJ',
            'code_kro_pn' => 'RCJ',
            'kro' => 'OM Sarana Bidang Ketenagakerjaan',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 176,
            'code_kro_non_pn' => 'CCK',
            'code_kro_pn' => 'RCK',
            'kro' => 'OM Sarana Bidang Konektivitas Perkeretaapian',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 177,
            'code_kro_non_pn' => 'CCL',
            'code_kro_pn' => 'RCL',
            'kro' => 'OM Sarana Bidang Teknologi Informasi dan Komunikasi',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 178,
            'code_kro_non_pn' => 'CCM',
            'code_kro_pn' => 'RCM',
            'kro' => 'OM Sarana Bidang Pencarian, Pertolongan, dan Penanganan Bencana',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 179,
            'code_kro_non_pn' => 'CDA',
            'code_kro_pn' => 'RDA',
            'kro' => 'OM Prasarana Bidang Konektivitas Perkeretaapian',
            'unit' => 'km'
        ]);

        Kro::create([
            'id' => 180,
            'code_kro_non_pn' => 'CDB',
            'code_kro_pn' => 'RDB',
            'kro' => 'OM Prasarana Bidang Perumahan dan Pemukiman',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 181,
            'code_kro_non_pn' => 'CDC',
            'code_kro_pn' => 'RDC',
            'kro' => 'OM Prasarana Bidang Konektivitas Darat (Jalan)',
            'unit' => 'km'
        ]);

        Kro::create([
            'id' => 182,
            'code_kro_non_pn' => 'CDD',
            'code_kro_pn' => 'RDD',
            'kro' => 'OM Prasarana Bidang Konektivitas Laut',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 183,
            'code_kro_non_pn' => 'CDE',
            'code_kro_pn' => 'RDE',
            'kro' => 'OM Prasarana Bidang Konektivitas Udara',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 184,
            'code_kro_non_pn' => 'CDF',
            'code_kro_pn' => 'RDF',
            'kro' => 'OM Prasarana Bidang Konektivitas Darat (Jembatan)',
            'unit' => 'm'
        ]);

        Kro::create([
            'id' => 185,
            'code_kro_non_pn' => 'CDG',
            'code_kro_pn' => 'RDG',
            'kro' => 'OM Prasarana Bidang SDA dan Irigasi',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 186,
            'code_kro_non_pn' => 'CDH',
            'code_kro_pn' => 'RDH',
            'kro' => 'OM Prasarana Bidang Pencarian, Pertolongan, dan Penanganan Bencana',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 187,
            'code_kro_non_pn' => 'CDI',
            'code_kro_pn' => 'RDI',
            'kro' => 'OM Prasarana Bidang Pendidikan Dasar dan Menengah',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 188,
            'code_kro_non_pn' => 'CDJ',
            'code_kro_pn' => 'RDJ',
            'kro' => 'OM Prasarana Bidang Pendidikan Tinggi',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 189,
            'code_kro_non_pn' => 'CDK',
            'code_kro_pn' => 'RDK',
            'kro' => 'OM Prasarana Bidang Pertanian, Kehutanan dan Lingkungan Hidup',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 190,
            'code_kro_non_pn' => 'CDL',
            'code_kro_pn' => 'RDL',
            'kro' => 'OM Prasarana Bidang Industri dan Perdagangan',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 191,
            'code_kro_non_pn' => 'CDM',
            'code_kro_pn' => 'RDM',
            'kro' => 'OM Prasarana Bidang Pertahanan dan Keamanan',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 192,
            'code_kro_non_pn' => 'CDN',
            'code_kro_pn' => 'RDN',
            'kro' => 'OM Prasarana Bidang Pariwisata dan Kebudayaan',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 193,
            'code_kro_non_pn' => 'CDO',
            'code_kro_pn' => 'RDO',
            'kro' => 'OM Prasarana Pengembangan Kawasan',
            'unit' => 'km2'
        ]);

        Kro::create([
            'id' => 194,
            'code_kro_non_pn' => 'CDP',
            'code_kro_pn' => 'RDP',
            'kro' => 'OM Prasarana Bidang Konektivitas Darat',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 195,
            'code_kro_non_pn' => 'CDQ',
            'code_kro_pn' => 'RDQ',
            'kro' => 'OM Prasarana Bidang Kemaritiman, Kelautan, dan Perikanan',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 196,
            'code_kro_non_pn' => 'CDR',
            'code_kro_pn' => 'RDR',
            'kro' => 'OM Prasarana Jaringan Sumber Daya Air',
            'unit' => 'Km'
        ]);

        Kro::create([
            'id' => 197,
            'code_kro_non_pn' => 'CDS',
            'code_kro_pn' => 'RDS',
            'kro' => 'OM Prasarana Bidang Teknologi Informasi dan Komunikasi',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 198,
            'code_kro_non_pn' => 'CDT',
            'code_kro_pn' => 'RDT',
            'kro' => 'OM Prasarana Bidang IPTEK',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 199,
            'code_kro_non_pn' => 'CEA',
            'code_kro_pn' => 'REA',
            'kro' => 'Konservasi Kawasan/Rehabilitasi Ekosistem',
            'unit' => 'Hektar'
        ]);

        Kro::create([
            'id' => 200,
            'code_kro_non_pn' => 'CEB',
            'code_kro_pn' => 'REB',
            'kro' => 'Konservasi Jenis/Spesies',
            'unit' => 'Jenis'
        ]);

        Kro::create([
            'id' => 201,
            'code_kro_non_pn' => 'DAA',
            'code_kro_pn' => 'SAA',
            'kro' => 'Pendidikan Vokasi Bidang Komunikasi dan Informatika',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 202,
            'code_kro_non_pn' => 'DAB',
            'code_kro_pn' => 'SAB',
            'kro' => 'Pendidikan Vokasi Bidang Infrastruktur',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 203,
            'code_kro_non_pn' => 'DAC',
            'code_kro_pn' => 'SAC',
            'kro' => 'Pendidikan Vokasi Bidang Pertanian dan Perikanan',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 204,
            'code_kro_non_pn' => 'DAD',
            'code_kro_pn' => 'SAD',
            'kro' => 'Pendidikan Vokasi Bidang Pariwisata dan Kebudayaan',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 205,
            'code_kro_non_pn' => 'DAE',
            'code_kro_pn' => 'SAE',
            'kro' => 'Pendidikan Vokasi Bidang Kehutananan dan Lingkungan Hidup',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 206,
            'code_kro_non_pn' => 'DAF',
            'code_kro_pn' => 'SAF',
            'kro' => 'Pendidikan Vokasi Bidang Kesehatan',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 207,
            'code_kro_non_pn' => 'DAG',
            'code_kro_pn' => 'SAG',
            'kro' => 'Pendidikan Vokasi Bidang Industri',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 208,
            'code_kro_non_pn' => 'DBA',
            'code_kro_pn' => 'SBA',
            'kro' => 'Pendidikan Tinggi',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 209,
            'code_kro_non_pn' => 'DBB',
            'code_kro_pn' => 'SBB',
            'kro' => 'Pendidikan Menengah',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 210,
            'code_kro_non_pn' => 'DBC',
            'code_kro_pn' => 'SBC',
            'kro' => 'Pendidikan Dasar',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 211,
            'code_kro_non_pn' => 'DBD',
            'code_kro_pn' => 'SBD',
            'kro' => 'Pendidikan Pra-Sekolah',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 212,
            'code_kro_non_pn' => 'DBE',
            'code_kro_pn' => 'SBE',
            'kro' => 'Pendidikan Non Gelar',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 213,
            'code_kro_non_pn' => 'DCA',
            'code_kro_pn' => 'SCA',
            'kro' => 'Pelatihan Bidang Komunikasi dan Informatika',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 214,
            'code_kro_non_pn' => 'DCB',
            'code_kro_pn' => 'SCB',
            'kro' => 'Pelatihan Bidang Infrastruktur',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 215,
            'code_kro_non_pn' => 'DCC',
            'code_kro_pn' => 'SCC',
            'kro' => 'Pelatihan Bidang Pertanian dan Perikanan',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 216,
            'code_kro_non_pn' => 'DCD',
            'code_kro_pn' => 'SCD',
            'kro' => 'Pelatihan Bidang Pariwisata dan Kebudayaan',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 217,
            'code_kro_non_pn' => 'DCE',
            'code_kro_pn' => 'SCE',
            'kro' => 'Pelatihan Bidang Kehutananan dan Lingkungan Hidup',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 218,
            'code_kro_non_pn' => 'DCF',
            'code_kro_pn' => 'SCF',
            'kro' => 'Pelatihan Bidang Ekonomi dan Keuangan',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 219,
            'code_kro_non_pn' => 'DCG',
            'code_kro_pn' => 'SCG',
            'kro' => 'Pelatihan Bidang Pertahanan dan Keamanan',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 220,
            'code_kro_non_pn' => 'DCH',
            'code_kro_pn' => 'SCH',
            'kro' => 'Pelatihan Bidang Industri',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 221,
            'code_kro_non_pn' => 'DCI',
            'code_kro_pn' => 'SCI',
            'kro' => 'Pelatihan Bidang Pendidikan',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 222,
            'code_kro_non_pn' => 'DCJ',
            'code_kro_pn' => 'SCJ',
            'kro' => 'Pelatihan Bidang Sosial',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 223,
            'code_kro_non_pn' => 'DCK',
            'code_kro_pn' => 'SCK',
            'kro' => 'Pelatihan Bidang Pencarian, Pertolongan, dan Penanganan Bencana',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 224,
            'code_kro_non_pn' => 'DCL',
            'code_kro_pn' => 'SCL',
            'kro' => 'Pelatihan Bidang Ekonomi Kreatif',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 225,
            'code_kro_non_pn' => 'DCM',
            'code_kro_pn' => 'SCM',
            'kro' => 'Pelatihan Bidang Kesehatan',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 226,
            'code_kro_non_pn' => 'DCN',
            'code_kro_pn' => 'SCN',
            'kro' => 'Pelatihan Bidang IPTEK',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 227,
            'code_kro_non_pn' => 'DDA',
            'code_kro_pn' => 'SDA',
            'kro' => 'Penelitian dan Pengembangan Produk',
            'unit' => 'Produk'
        ]);

        Kro::create([
            'id' => 228,
            'code_kro_non_pn' => 'DDB',
            'code_kro_pn' => 'SDB',
            'kro' => 'Penelitian dan Pengembangan Purwarupa',
            'unit' => 'Purwarupa'
        ]);

        Kro::create([
            'id' => 229,
            'code_kro_non_pn' => 'DDC',
            'code_kro_pn' => 'SDC',
            'kro' => 'Penelitian dan Pengembangan Modeling',
            'unit' => 'model'
        ]);

        Kro::create([
            'id' => 230,
            'code_kro_non_pn' => 'DDD',
            'code_kro_pn' => 'SDD',
            'kro' => 'Penelitian dan Pengembangan yang Dipatenkan',
            'unit' => 'kekayaan\nintelektual'
        ]);

        Kro::create([
            'id' => 231,
            'code_kro_non_pn' => 'EBA',
            'code_kro_pn' => '',
            'kro' => 'Layanan Manajemen Dukungan Internal',
            'unit' => 'Layanan'
        ]);

        Kro::create([
            'id' => 232,
            'code_kro_non_pn' => 'EBB',
            'code_kro_pn' => '',
            'kro' => 'Layanan Sarana dan Prasarana Internal',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 233,
            'code_kro_non_pn' => 'EBC',
            'code_kro_pn' => '',
            'kro' => 'Layanan Manajemen SDM Internal',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 234,
            'code_kro_non_pn' => 'EBD',
            'code_kro_pn' => '',
            'kro' => 'Layanan Manajemen Kinerja Internal',
            'unit' => 'Dokumen'
        ]);

        Kro::create([
            'id' => 235,
            'code_kro_non_pn' => 'FAA',
            'code_kro_pn' => 'UAA',
            'kro' => 'Kearsipan',
            'unit' => 'Dokumen'
        ]);

        Kro::create([
            'id' => 236,
            'code_kro_non_pn' => 'FAB',
            'code_kro_pn' => 'UAB',
            'kro' => 'Sistem Informasi Pemerintahan',
            'unit' => 'Sistem\nInformasi'
        ]);

        Kro::create([
            'id' => 237,
            'code_kro_non_pn' => 'FAC',
            'code_kro_pn' => 'UAC',
            'kro' => 'Peningkatan Kapasitas Aparatur Negara',
            'unit' => 'Orang'
        ]);

        Kro::create([
            'id' => 238,
            'code_kro_non_pn' => 'FAD',
            'code_kro_pn' => 'UAD',
            'kro' => 'Perencanaan dan Penganggaran',
            'unit' => 'layanan'
        ]);

        Kro::create([
            'id' => 239,
            'code_kro_non_pn' => 'FAE',
            'code_kro_pn' => 'UAE',
            'kro' => 'Pemantauan dan Evaluasi serta Pelaporan',
            'unit' => 'laporan'
        ]);

        Kro::create([
            'id' => 240,
            'code_kro_non_pn' => 'FAF',
            'code_kro_pn' => 'UAF',
            'kro' => 'Pemeriksaan Keuangan Negara',
            'unit' => 'laporan'
        ]);

        Kro::create([
            'id' => 241,
            'code_kro_non_pn' => 'FAG',
            'code_kro_pn' => 'UAG',
            'kro' => 'Pengawasan Pembangunan',
            'unit' => 'laporan'
        ]);

        Kro::create([
            'id' => 242,
            'code_kro_non_pn' => 'FAH',
            'code_kro_pn' => 'UAH',
            'kro' => 'Pengelolaan Keuangan Negara',
            'unit' => 'laporan'
        ]);

        Kro::create([
            'id' => 243,
            'code_kro_non_pn' => 'FAI',
            'code_kro_pn' => 'UAI',
            'kro' => 'Peningkatan Manajemen Lembaga\nPemerintahan',
            'unit' => 'Lembaga'
        ]);

        Kro::create([
            'id' => 244,
            'code_kro_non_pn' => 'FAJ',
            'code_kro_pn' => 'UAJ',
            'kro' => 'Benda Materai dan Cukai',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 245,
            'code_kro_non_pn' => 'FAK',
            'code_kro_pn' => 'UAK',
            'kro' => 'Pengelolaan Aset BUN',
            'unit' => 'Unit'
        ]);

        Kro::create([
            'id' => 246,
            'code_kro_non_pn' => 'FAL',
            'code_kro_pn' => 'UAL',
            'kro' => 'Pengelolaan Pelaksanaan Anggaran dan Pembiayaan',
            'unit' => 'Dokumen'
        ]);

        Kro::create([
            'id' => 247,
            'code_kro_non_pn' => 'FAM',
            'code_kro_pn' => 'UAM',
            'kro' => 'Hasil Kelolaan Dana',
            'unit' => 'Rupiah'
        ]);

        Kro::create([
            'id' => 248,
            'code_kro_non_pn' => 'FBA',
            'code_kro_pn' => 'UBA',
            'kro' => 'Fasilitasi dan Pembinaan Pemerintah Daerah',
            'unit' => 'Daerah\n(Prov/Kab/Kota)'
        ]);

        Kro::create([
            'id' => 249,
            'code_kro_non_pn' => 'FBB',
            'code_kro_pn' => 'UBB',
            'kro' => 'Fasilitasi dan Pembinaan Pemerintah Desa',
            'unit' => 'Desa'
        ]);
    }
}
