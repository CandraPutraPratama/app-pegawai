@extends('layouts.app')

@section('title', 'Daftar Pegawai')

@section('content')
<div class="container my-5">
    <div class="alert alert-success d-none" role="alert" id="successAlert">
        <i class="bi bi-check-circle-fill me-2"></i>
        <span id="successMessage">Data berhasil disimpan!</span>
    </div>

    <div class="card main-card">
        <div class="card-header-custom d-flex justify-content-between align-items-center flex-wrap">
            <h1 class="page-title">
                <i class="bi bi-list-ul me-2"></i>Daftar Pegawai
            </h1>
            <a href="{{ route('employees.create') }}" class="btn btn-tambah">
                <i class="bi bi-plus-circle me-2"></i>Tambah Pegawai
            </a>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table custom-table table-hover align-middle">
                    <thead>
                        <tr>
                            <th style="width: 50px;">No.</th>
                            <th style="min-width: 220px;">Nama Lengkap</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Jabatan</th>
                            <th>Tanggal Masuk</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($employees as $employee)
                        <tr>
                            <td class="fw-semibold">{{ $loop->iteration + ($employees->currentPage() - 1) * $employees->perPage() }}</td>
                            <td>
                                <!-- dimasukin waktu buat tambah fitur, waktu UAS -->
                                <!-- <div class="d-flex align-items-center">
                                    <div class="avatar-circle bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 35px; height: 35px; font-weight: 600;">
                                        {{ substr($employee->nama_lengkap, 0, 2) }}
                                    </div> -->
                                {{ $employee->nama_lengkap }}
                                <!-- </div> -->
                            </td>
                            <td>{{ $employee->email }}</td>
                            {{-- Relasi --}}
                            <td>{{ $employee->department->nama_departemen ?? 'N/A' }}</td>
                            <td>{{ $employee->position->nama_jabatan ?? 'N/A' }}</td>
                            {{-- End Relasi --}}
                            <td>{{ $employee->tanggal_masuk }}</td>
                            <td>
                                @php
                                $badge_class = ($employee->status == 'aktif') ? 'status-aktif' : 'status-nonaktif';
                                @endphp
                                <span class="status-badge {{ $badge_class }}">
                                    {{ ucfirst($employee->status) }}
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-aksi-detail btn-sm">
                                        <i class="bi bi-eye me-1"></i>Detail
                                    </a>
                                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-aksi-edit btn-sm">
                                        <i class="bi bi-pencil-square me-1"></i>Edit
                                    </a>
                                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-aksi-hapus btn-sm" onclick="return confirm('Yakin ingin menghapus data {{ $employee->nama_lengkap }}?')">
                                            <i class="bi bi-trash me-1"></i>Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="empty-state">
                                <i class="bi bi-inbox"></i>
                                <h5>Belum ada data pegawai</h5>
                                <p class="text-muted">Klik tombol "Tambah Pegawai" untuk menambahkan data baru</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer bg-white border-0 py-3">
            {{ $employees->links('pagination::bootstrap-5') }} {{-- Pakai pagination dari Laravel --}}
        </div>
    </div>
</div>
@endsection