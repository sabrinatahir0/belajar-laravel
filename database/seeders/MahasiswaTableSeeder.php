<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('mahasiswa')->insert([
            [
                'npm' => '18429090',
                'nama' => 'CANTIK JELITA',
                'prodi' => 'TI',
                'tahunmasuk' => 2018,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'npm' => '18428090',
                'nama' => 'GANTENG MAKSIMAL',
                'prodi' => 'SI',
                'tahunmasuk' => 2018,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'npm' => '18326090',
                'nama' => 'CETAR MEMBAHANA',
                'prodi' => 'MI',
                'tahunmasuk' => 2018,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'npm' => '18327090',
                'nama' => 'GLOWING', 
                'prodi' => 'KA', 
                'tahunmasuk' => 2018, 
                'created_at' => now(), 
                'updated_at' => now(),
            ],
        ]);
    }
}