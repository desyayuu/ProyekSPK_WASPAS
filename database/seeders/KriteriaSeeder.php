<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Data contoh untuk kriteria
       $kriteria = [
        [
            'nama_kriteria' => 'IPK',
            'bobot_kriteria' => 0.20,
            'jenis_kriteria' => 'Benefit',
        ],
        [
            'nama_kriteria' => 'Pendapatan Orang Tua',
            'bobot_kriteria' => 0.05,
            'jenis_kriteria' => 'Cost',
        ],
        [
            'nama_kriteria' => 'Prestasi',
            'bobot_kriteria' => 0.15,
            'jenis_kriteria' => 'Benefit',
        ],
        [
            'nama_kriteria' => 'Semester',
            'bobot_kriteria' => 0.05,
            'jenis_kriteria' => 'Cost',
        ],
        [
            'nama_kriteria' => 'Status Penerimaan',
            'bobot_kriteria' => 0.25,
            'jenis_kriteria' => 'Benefit',
        ],
        [
            'nama_kriteria' => 'Pengalaman Organisasi',
            'bobot_kriteria' => 0.05,
            'jenis_kriteria' => 'Benefit',
        ],
        [
            'nama_kriteria' => 'Jumlah Tanggungan',
            'bobot_kriteria' => 0.05,
            'jenis_kriteria' => 'Cost',
        ],
        [
            'nama_kriteria' => 'Skor TOEFL',
            'bobot_kriteria' => 0.10,
            'jenis_kriteria' => 'Benefit',
        ],
        [
            'nama_kriteria' => 'Projek',
            'bobot_kriteria' => 0.05,
            'jenis_kriteria' => 'Benefit',
        ],
        [
            'nama_kriteria' => 'Sikap',
            'bobot_kriteria' => 0.05,
            'jenis_kriteria' => 'Benefit',
        ],
    ];

    // Masukkan data ke dalam tabel kriteria
    foreach ($kriteria as $kriteriaData) {
        DB::table('kriteria')->insert($kriteriaData);
    }
 }
}
