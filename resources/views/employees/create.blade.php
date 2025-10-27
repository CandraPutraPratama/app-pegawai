@extends('layouts.app')

@section('title', 'Tambah Pegawai')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Tambah Pegawai Baru</h1>
    <div class="card p-4">
        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            @include('employees.form')
            <button type="submit" class="btn btn-primary mt-3">Simpan Data</button>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary mt-3">Batal</a>
        </form>
    </div>
</div>
@endsection