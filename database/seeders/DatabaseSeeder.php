<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use App\Models\User; // Bisa dihapus karena kita gak pake factory

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 👇 Panggil Seeder yang lo butuhkan di sini! 👇
        $this->call([
            // Department harus duluan karena Position mungkin butuh Departemen (walaupun gak di case ini)
            DepartmentSeeder::class,
            PositionSeeder::class,
            // Kalo mau buat user baru yang aman, bisa taruh di sini, tapi jangan pakai 'test@example.com'
        ]);
    }
}
