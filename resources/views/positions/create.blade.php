@extends('layouts.app')

@section('title', 'Tambah Jabatan')

@section('content')
<div class="container my-5">
    <div class="card main-card mx-auto" style="max-width: 600px;">
        <div class="card-header-custom">
            <h1 class="page-title">
                <i class="bi bi-person-badge me-2"></i>Tambah Jabatan Baru
            </h1>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('positions.store') }}" method="POST">
                @csrf

                @include('positions.form')

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('positions.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-tambah">
                        <i class="bi bi-save me-1"></i> Simpan Jabatan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection