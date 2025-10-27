@extends('layouts.app')

@section('title', 'Edit Jabatan')

@section('content')
<div class="container my-5">
    <div class="card main-card mx-auto" style="max-width: 600px;">
        <div class="card-header-custom">
            <h1 class="page-title">
                <i class="bi bi-arrow-repeat me-2"></i>Edit Jabatan
            </h1>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('positions.update', $position->id) }}" method="POST">
                @csrf
                @method('PUT')

                @include('positions.form')

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('positions.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-warning text-dark">
                        <i class="bi bi-check-circle me-1"></i> Update Jabatan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection