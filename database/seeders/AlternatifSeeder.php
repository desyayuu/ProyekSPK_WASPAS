<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data contoh untuk alternatif
        $alternatif = [
            ['nama_alternatif' => 'Choi Seungcheol'],
            ['nama_alternatif' => 'Yoon Jeonghan'],
            ['nama_alternatif' => 'Joshua Hadi'],
            ['nama_alternatif' => 'Moon Junhui'],
            ['nama_alternatif' => 'Jeon Wonwoo'],
            ['nama_alternatif' => 'Kwon Soonyoung'],
            ['nama_alternatif' => 'Lee Jihoon'],
            ['nama_alternatif' => 'Xu Minghao'],
            ['nama_alternatif' => 'Kim Mingyu'],
            ['nama_alternatif' => 'Lee Seokmin'],
            ['nama_alternatif' => 'Boo Seungkwan'],
            ['nama_alternatif' => 'Chwe Hansol'],
            ['nama_alternatif' => 'Boo Seungkwan'],
            ['nama_alternatif' => 'Chwe Hansol'],
            ['nama_alternatif' => 'Lee Chan'],
            ['nama_alternatif' => 'Daniel Katamandara'],
            ['nama_alternatif' => 'Wafi'],
            ['nama_alternatif' => 'Bambang'],
            ['nama_alternatif' => 'Soesantyo'],
            ['nama_alternatif' => 'Gemiro Kava'],
        ];

        // Masukkan data ke dalam tabel alternatif
        foreach ($alternatif as $alternatifData) {
            DB::table('alternatif')->insert($alternatifData);
        }
    }
}
