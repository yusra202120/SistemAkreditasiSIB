<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LevelModel;

class LevelSeeder extends Seeder
{
    public function run(): void
    {
        LevelModel::insert([
            ['level_kode' => 'ADM', 'role' => 'Administrator'],
            ['level_kode' => 'KRK', 'role' => 'Koordinator Kriteria'],
            ['level_kode' => 'KPS', 'role' => 'Kepala Program Studi'],
            ['level_kode' => 'KJR', 'role' => 'Ketua Jurusan'],
            ['level_kode' => 'KJM', 'role' => 'Kantor Jaminan Mutu'],
            ['level_kode' => 'DIR', 'role' => 'Direktur'],
        ]);
    }
}
