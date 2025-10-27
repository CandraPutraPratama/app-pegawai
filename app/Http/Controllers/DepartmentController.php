<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    // READ (Tampilkan daftar)
    public function index()
    {
        $departments = Department::latest()->paginate(10);
        return view('departments.index', compact('departments'));
    }

    // CREATE (Tampilkan Form)
    public function create()
    {
        return view('departments.create');
    }

    // STORE (Simpan data baru)
    public function store(Request $request)
    {
        $request->validate([
            'nama_departemen' => 'required|string|max:100|unique:departments,nama_departemen',
        ]);

        Department::create($request->all());
        return redirect()->route('departments.index')->with('success', 'Departemen berhasil ditambahkan!');
    }

    // EDIT (Tampilkan Form Edit)
    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    // UPDATE (Update data)
    public function update(Request $request, Department $department)
    {
        $request->validate([
            // Pastikan nama unik, kecuali nama itu sendiri
            'nama_departemen' => 'required|string|max:100|unique:departments,nama_departemen,' . $department->id,
        ]);

        $department->update($request->all());
        return redirect()->route('departments.index')->with('success', 'Departemen berhasil diupdate!');
    }

    // DELETE (Hapus data)
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')->with('success', 'Departemen berhasil dihapus!');
    }
}
