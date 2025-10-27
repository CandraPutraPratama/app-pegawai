@extends('layouts.app')

@section('title', 'Tambah Absensi Pegawai')

@section('content')
<div class="container my-5">
    <div class="card main-card mx-auto" style="max-width: 700px;">
        <div class="card-header-custom">
            <h1 class="page-title">
                <i class="bi bi-calendar-plus me-2"></i>Tambah Data Absensi
            </h1>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('attendance.store') }}" method="POST">
                @csrf

                @include('attendance.form')

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('attendance.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-tambah">
                        <i class="bi bi-save me-1"></i> Simpan Absensi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection