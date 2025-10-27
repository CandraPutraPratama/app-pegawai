<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Employee;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index()
    {
        $salaries = Salary::with('employee')->latest()->paginate(10);
        return view('salaries.index', compact('salaries'));
    }

    public function create()
    {
        $employees = Employee::orderBy('nama_lengkap')->get();

        return view('salaries.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan' => 'required|string|max:10', // Contoh: 'Oktober 2025'
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'nullable|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0',
        ]);

        $data = $request->all();

        $gaji_pokok = $data['gaji_pokok'];
        $tunjangan = $data['tunjangan'] ?? 0;
        $potongan = $data['potongan'] ?? 0;

        $data['total_gaji'] = $gaji_pokok + $tunjangan - $potongan;

        Salary::create($data);
        return redirect()->route('salaries.index')->with('success', 'Data Gaji berhasil dicatat!');
    }

    public function edit(Salary $salary)
    {
        $employees = Employee::orderBy('nama_lengkap')->get();
        return view('salaries.edit', compact('salary', 'employees'));
    }

    public function update(Request $request, Salary $salary)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan' => 'required|string|max:10',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'nullable|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0',
        ]);

        $data = $request->all();

        $gaji_pokok = $data['gaji_pokok'];
        $tunjangan = $data['tunjangan'] ?? 0;
        $potongan = $data['potongan'] ?? 0;

        $data['total_gaji'] = $gaji_pokok + $tunjangan - $potongan;

        $salary->update($data);
        return redirect()->route('salaries.index')->with('success', 'Data Gaji berhasil diupdate!');
    }

    public function destroy(Salary $salary)
    {
        $salary->delete();
        return redirect()->route('salaries.index')->with('success', 'Data Gaji berhasil dihapus!');
    }
}
