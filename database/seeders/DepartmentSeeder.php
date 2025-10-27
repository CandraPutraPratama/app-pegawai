<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        Department::create(['nama_departemen' => 'IT & Software']);

        Department::create(['nama_departemen' => 'Finance & Accounting']);

        Department::create(['nama_departemen' => 'Human Resources']);

        Department::create(['nama_departemen' => 'Marketing']);
    }
}
