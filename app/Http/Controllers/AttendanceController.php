<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with('employee')->latest()->paginate(10);
        return view('attendance.index', compact('attendances'));
    }

    public function create()
    {
        $employees = Employee::orderBy('nama_lengkap')->get();

        return view('attendance.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'nullable|date_format:H:i',
            'waktu_keluar' => 'nullable|date_format:H:i|after:waktu_masuk',
            'status_absensi' => 'required|in:hadir,izin,sakit,alpha',
        ]);

        Attendance::create($request->all());
        return redirect()->route('attendance.index')->with('success', 'Data Absensi berhasil ditambahkan!');
    }

    public function edit(Attendance $attendance)
    {
        $employees = Employee::orderBy('nama_lengkap')->get();
        return view('attendance.edit', compact('attendance', 'employees'));
    }

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

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect()->route('attendance.index')->with('success', 'Data Absensi berhasil dihapus!');
    }
}
