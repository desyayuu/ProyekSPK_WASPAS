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
        DB::table('kriteria')->insert([
            [
                'id' => '1',
                'nama_kriteria' => 'IPK',
                'bobot_kriteria' => 0.20,
                'jenis_kriteria' => 'benefit'
            ],
            [
                'id' => '2',
                'nama_kriteria' => 'Penghasilan Orangtua',
                'bobot_kriteria' => 0.05,
                'jenis_kriteria' => 'cost'
            ],
            [
                'id' => '3',
                'nama_kriteria' => 'Prestasi',
                'bobot_kriteria' => 0.15, 
                'jenis_kriteria' => 'benefit'
            ],
            [
                'id' => '4',
                'nama_kriteria' => 'Semester',
                'bobot_kriteria' => 0.05,
                'jenis_kriteria' => 'cost'
            ],
            [
                'id' => '5',
                'nama_kriteria' => 'Status Penerimaan Beasiswa',
                'bobot_kriteria' => 0.25,
                'jenis_kriteria' => 'benefit'
            ],
            [
                'id' => '6',
                'nama_kriteria' => 'Pengalaman Organisasi',
                'bobot_kriteria' => 0.05,
                'jenis_kriteria' => 'benefit'
            ],
            [
                'id' => '7',
                'nama_kriteria' => 'Jumlah Tanggungan',
                'bobot_kriteria' => 0.05,
                'jenis_kriteria' => 'cost'
            ],
            [
                'id' => '8',
                'nama_kriteria' => 'Skor TOEFL',
                'bobot_kriteria' => 0.10, 
                'jenis_kriteria' => 'benefit'
            ],
            [
                'id' => '9',
                'nama_kriteria' => 'Projek',
                'bobot_kriteria' => 0.20, 
                'jenis_kriteria' => 'benefit'
            ],
            [
                'id' => '10',
                'nama_kriteria' => 'Sikap',
                'bobot_kriteria' => 0.05, 
                'jenis_kriteria' => 'benefit'
            ],
        ]);
    }
}