<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    // READ (Tampilkan daftar Jabatan)
    public function index()
    {
        $positions = Position::latest()->paginate(10);
        return view('positions.index', compact('positions'));
    }

    // CREATE (Tampilkan Form)
    public function create()
    {
        return view('positions.create');
    }

    // STORE (Simpan data baru)
    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:100|unique:positions,nama_jabatan',
            'gaji_pokok' => 'required|numeric|min:1000', // Gaji minimal 1000
        ]);

        Position::create($request->all());
        return redirect()->route('positions.index')->with('success', 'Jabatan berhasil ditambahkan!');
    }

    // EDIT (Tampilkan Form Edit)
    public function edit(Position $position)
    {
        return view('positions.edit', compact('position'));
    }

    // UPDATE (Update data)
    public function update(Request $request, Position $position)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:100|unique:positions,nama_jabatan,' . $position->id,
            'gaji_pokok' => 'required|numeric|min:1000',
        ]);

        $position->update($request->all());
        return redirect()->route('positions.index')->with('success', 'Jabatan berhasil diupdate!');
    }

    // DELETE (Hapus data)
    public function destroy(Position $position)
    {
        $position->delete();
        return redirect()->route('positions.index')->with('success', 'Jabatan berhasil dihapus!');
    }
}
