@extends('layouts.app')

@section('title', 'Edit Data Gaji')

@section('content')
<div class="container my-5">
    <div class="card main-card mx-auto" style="max-width: 700px;">
        <div class="card-header-custom">
            <h1 class="page-title">
                <i class="bi bi-arrow-repeat me-2"></i>Edit Data Gaji
            </h1>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('salaries.update', $salary->id) }}" method="POST">
                @csrf
                @method('PUT')

                @include('salaries.form')

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('salaries.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-warning text-dark">
                        <i class="bi bi-check-circle me-1"></i> Update Gaji
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection