@extends('layouts.app')

@section('title', 'Edit Departemen')

@section('content')
<div class="container my-5">
    <div class="card main-card mx-auto" style="max-width: 500px;">
        <div class="card-header-custom">
            <h1 class="page-title">Edit Departemen</h1>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('departments.update', $department->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama_departemen" class="form-label fw-semibold">Nama Departemen</label>
                    <input type="text" class="form-control @error('nama_departemen') is-invalid @enderror" id="nama_departemen" name="nama_departemen" value="{{ old('nama_departemen', $department->nama_departemen) }}" required>
                    @error('nama_departemen')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('departments.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-warning text-dark">
                        <i class="bi bi-arrow-repeat me-1"></i> Update Departemen
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection