@extends('layouts.app')

@section('title', 'Daftar Jabatan')

@section('content')
<div class="container my-5">
    <div class="alert alert-success d-none" role="alert" id="successAlert">
        <i class="bi bi-check-circle-fill me-2"></i>
        <span id="successMessage">Pesan Sukses</span>
    </div>

    <div class="card main-card">
        <div class="card-header-custom d-flex justify-content-between align-items-center flex-wrap">
            <h1 class="page-title">
                <i class="bi bi-person-badge me-2"></i>Daftar Jabatan
            </h1>
            <a href="{{ route('positions.create') }}" class="btn btn-tambah">
                <i class="bi bi-plus-circle me-2"></i>Tambah Jabatan
            </a>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table custom-table table-hover align-middle">
                    <thead>
                        <tr>
                            <th style="width: 50px;">No.</th>
                            <th style="min-width: 250px;">Nama Jabatan</th>
                            <th style="min-width: 150px;">Gaji Pokok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($positions as $position)
                        <tr>
                            <td class="fw-semibold">{{ $loop->iteration + ($positions->currentPage() - 1) * $positions->perPage() }}</td>
                            <td>{{ $position->nama_jabatan }}</td>
                            <td>Rp {{ number_format($position->gaji_pokok, 2, ',', '.') }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('positions.edit', $position->id) }}" class="btn btn-aksi-edit btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                                    <form action="{{ route('positions.destroy', $position->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-aksi-hapus btn-sm" onclick="return confirm('Hapus jabatan {{ $position->nama_jabatan }}?')"><i class="bi bi-trash"></i> Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="empty-state">
                                <i class="bi bi-inbox"></i>
                                <h5>Belum ada data jabatan.</h5>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer bg-white border-0 py-3">
            {{ $positions->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection