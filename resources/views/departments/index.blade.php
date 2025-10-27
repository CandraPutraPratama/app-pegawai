@extends('layouts.app')

@section('title', 'Daftar Departemen')

@section('content')
<div class="container my-5">
    <div class="alert alert-success d-none" role="alert" id="successAlert">
        <i class="bi bi-check-circle-fill me-2"></i>
        <span id="successMessage">Pesan Sukses</span>
    </div>

    <div class="card main-card">
        <div class="card-header-custom d-flex justify-content-between align-items-center flex-wrap">
            <h1 class="page-title">
                <i class="bi bi-building me-2"></i>Daftar Departemen
            </h1>
            <a href="{{ route('departments.create') }}" class="btn btn-tambah">
                <i class="bi bi-plus-circle me-2"></i>Tambah Departemen
            </a>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table custom-table table-hover align-middle">
                    <thead>
                        <tr>
                            <th style="width: 50px;">No.</th>
                            <th style="min-width: 300px;">Nama Departemen</th>
                            <th>Dibuat Pada</th>
                            <th style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($departments as $department)
                        <tr>
                            <td class="fw-semibold">{{ $loop->iteration + ($departments->currentPage() - 1) * $departments->perPage() }}</td>
                            <td>{{ $department->nama_departemen }}</td>
                            <td>{{ $department->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-aksi-edit btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('departments.destroy', $department->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-aksi-hapus btn-sm" onclick="return confirm('Yakin hapus departemen {{ $department->nama_departemen }}?')">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="empty-state">
                                <i class="bi bi-inbox"></i>
                                <h5>Belum ada data departemen.</h5>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer bg-white border-0 py-3">
            {{ $departments->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection