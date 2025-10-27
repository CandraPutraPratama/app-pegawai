@extends('layouts.app')

@section('title', 'Daftar Gaji Pegawai')

@section('content')
<div class="container my-5">
    <div class="card main-card">
        <div class="card-header-custom d-flex justify-content-between align-items-center flex-wrap">
            <h1 class="page-title"><i class="bi bi-wallet-fill me-2"></i>Daftar Gaji Pegawai</h1>
            <a href="{{ route('salaries.create') }}" class="btn btn-tambah">
                <i class="bi bi-plus-circle me-2"></i>Catat Gaji
            </a>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table custom-table table-hover align-middle">
                    <thead>
                        <tr>
                            <th style="width: 50px;">No.</th>
                            <th style="min-width: 200px;">Nama Pegawai</th>
                            <th>Periode Bulan</th>
                            <th>Gaji Pokok</th>
                            <th>Tunjangan</th>
                            <th>Potongan</th>
                            <th>Total Gaji</th>
                            <th style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($salaries as $salary)
                        <tr>
                            <td class="fw-semibold">{{ $loop->iteration + ($salaries->currentPage() - 1) * $salaries->perPage() }}</td>
                            <td>{{ $salary->employee->nama_lengkap ?? 'N/A' }}</td>
                            <td>{{ $salary->bulan }}</td>
                            <td>Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($salary->potongan, 0, ',', '.') }}</td>
                            <td class="fw-bold">Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('salaries.edit', $salary->id) }}" class="btn btn-aksi-edit btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                                    <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-aksi-hapus btn-sm" onclick="return confirm('Hapus data gaji bulan {{ $salary->bulan }}?')"><i class="bi bi-trash"></i> Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="empty-state">Belum ada data gaji yang dicatat.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white border-0 py-3">
            {{ $salaries->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection