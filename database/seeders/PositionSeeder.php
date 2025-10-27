<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Position;

class PositionSeeder extends Seeder
{
    public function run(): void
    {
        Position::create([
            'nama_jabatan' => 'Manager IT',
            'gaji_pokok' => 10000000.00
        ]);

        Position::create([
            'nama_jabatan' => 'Staff Administrasi',
            'gaji_pokok' => 5000000.00
        ]);

        Position::create([
            'nama_jabatan' => 'Marketing Executive',
            'gaji_pokok' => 6500000.00
        ]);
    }
}
