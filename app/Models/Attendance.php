<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance'; // Pastikan nama tabel benar

    // Field yang ada di tabel, termasuk FK
    protected $fillable = [
        'karyawan_id',
        'tanggal',
        'waktu_masuk',
        'waktu_keluar',
        'status_absensi'
    ];

    // Relasi ke tabel employees (penting buat READ)
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'karyawan_id');
    }
}
