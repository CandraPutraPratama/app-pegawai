<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    // READ (Tampilkan daftar)
    public function index()
    {
        // Eager load employee biar bisa tampilkan nama
        $attendances = Attendance::with('employee')->latest()->paginate(10);
        return view('attendance.index', compact('attendances'));
    }

    // CREATE (Tampilkan Form)
    public function create()
    {
        // Ambil semua data pegawai untuk dropdown
        $employees = Employee::orderBy('nama_lengkap')->get();

        return view('attendance.create', compact('employees'));
    }

    // STORE (Simpan data baru)
    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'nullable|date_format:H:i', // Format jam:menit
            'waktu_keluar' => 'nullable|date_format:H:i|after:waktu_masuk', // Keluar harus setelah masuk
            'status_absensi' => 'required|in:hadir,izin,sakit,alpha', // Sesuai ENUM
        ]);

        Attendance::create($request->all());
        return redirect()->route('attendance.index')->with('success', 'Data Absensi berhasil ditambahkan!');
    }

    // EDIT (Tampilkan Form Edit)
    public function edit(Attendance $attendance)
    {
        $employees = Employee::orderBy('nama_lengkap')->get();
        return view('attendance.edit', compact('attendance', 'employees'));
    }

    // UPDATE (Update data)
    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'nullable|date_format:H:i',
            'waktu_keluar' => 'nullable|date_format:H:i|after:waktu_masuk',
            'status_absensi' => 'required|in:hadir,izin,sakit,alpha',
        ]);

        $attendance->update($request->all());
        return redirect()->route('attendance.index')->with('success', 'Data Absensi berhasil diupdate!');
    }

    // DELETE (Hapus data)
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect()->route('attendance.index')->with('success', 'Data Absensi berhasil dihapus!');
    }
}
