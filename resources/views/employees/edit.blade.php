@extends('layouts.app')

@section('title', 'Edit Pegawai')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Edit Pegawai: {{ $employee->nama_lengkap ?? 'N/A' }}</h1>
    <div class="card p-4">
        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('employees.form', ['employee' => $employee])
            <button type="submit" class="btn btn-warning mt-3">Update Data</button>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary mt-3">Batal</a>
        </form>
    </div>
</div>
@endsection