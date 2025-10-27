<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $table = 'salaries';

    // Field yang ada di tabel, termasuk FK
    protected $fillable = [
        'karyawan_id',
        'bulan',
        'gaji_pokok',
        'tunjangan',
        'potongan',
        'total_gaji',
    ];

    // Relasi ke tabel employees (penting buat READ)
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'karyawan_id');
    }
}
