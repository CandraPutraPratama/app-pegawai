@extends('layouts.app')

@section('title', 'Daftar Absensi')

@section('content')
<div class="container my-5">
    <div class="card main-card">
        <div class="card-header-custom d-flex justify-content-between align-items-center flex-wrap">
            <h1 class="page-title"><i class="bi bi-calendar-check me-2"></i>Daftar Absensi</h1>
            <a href="{{ route('attendance.create') }}" class="btn btn-tambah">
                <i class="bi bi-plus-circle me-2"></i>Tambah Absensi
            </a>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table custom-table table-hover align-middle">
                    <thead>
                        <tr>
                            <th style="width: 50px;">No.</th>
                            <th style="min-width: 200px;">Nama Pegawai</th>
                            <th>Tanggal</th>
                            <th>Masuk</th>
                            <th>Keluar</th>
                            <th>Status</th>
                            <th style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($attendances as $attendance)
                        <tr>
                            <td class="fw-semibold">{{ $loop->iteration + ($attendances->currentPage() - 1) * $attendances->perPage() }}</td>
                            <td>{{ $attendance->employee->nama_lengkap ?? 'N/A' }}</td>
                            <td>{{ $attendance->tanggal }}</td>
                            <td>{{ $attendance->waktu_masuk ?? '-' }}</td>
                            <td>{{ $attendance->waktu_keluar ?? '-' }}</td>
                            <td>
                                <span class="status-badge bg-{{ $attendance->status_absensi == 'hadir' ? 'success' : ($attendance->status_absensi == 'izin' ? 'info' : 'danger') }}">
                                    {{ ucfirst($attendance->status_absensi) }}
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('attendance.edit', $attendance->id) }}" class="btn btn-aksi-edit btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                                    <form action="{{ route('attendance.destroy', $attendance->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-aksi-hapus btn-sm" onclick="return confirm('Hapus absensi tanggal {{ $attendance->tanggal }}?')"><i class="bi bi-trash"></i> Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="empty-state">Belum ada data absensi.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white border-0 py-3">
            {{ $attendances->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection