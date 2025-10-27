<div class="mb-3">
    <label for="karyawan_id" class="form-label fw-semibold">Nama Pegawai</label>
    <select class="form-select @error('karyawan_id') is-invalid @enderror" id="karyawan_id" name="karyawan_id" required>
        <option value="" disabled selected hidden>Pilih Pegawai</option>
        @foreach($employees as $employee)
        <option value="{{ $employee->id }}"
            @if(isset($attendance) && $attendance->karyawan_id == $employee->id) selected @endif>
            {{ $employee->nama_lengkap }} ({{ $employee->department->nama_departemen ?? 'N/A' }})
        </option>
        @endforeach
    </select>
    @error('karyawan_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="tanggal" class="form-label fw-semibold">Tanggal Absensi</label>
    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal', $attendance->tanggal ?? date('Y-m-d')) }}" required>
    @error('tanggal') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="waktu_masuk" class="form-label fw-semibold">Jam Masuk</label>
        <input type="time" class="form-control @error('waktu_masuk') is-invalid @enderror" id="waktu_masuk" name="waktu_masuk" value="{{ old('waktu_masuk', isset($attendance) && $attendance->waktu_masuk ? \Carbon\Carbon::parse($attendance->waktu_masuk)->format('H:i') : '') }}">
        @error('waktu_masuk') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label for="waktu_keluar" class="form-label fw-semibold">Jam Keluar</label>
        <input type="time" class="form-control @error('waktu_keluar') is-invalid @enderror" id="waktu_keluar" name="waktu_keluar" value="{{ old('waktu_keluar', isset($attendance) && $attendance->waktu_keluar ? \Carbon\Carbon::parse($attendance->waktu_keluar)->format('H:i') : '') }}">
        @error('waktu_keluar') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="mb-3">
    <label for="status_absensi" class="form-label fw-semibold">Status Absensi</label>
    <select class="form-select @error('status_absensi') is-invalid @enderror" id="status_absensi" name="status_absensi" required>
        <option value="" disabled selected hidden>Pilih Status</option>
        @foreach(['hadir', 'izin', 'sakit', 'alpha'] as $status)
        <option value="{{ $status }}"
            @if( (isset($attendance) && $attendance->status_absensi == $status) || old('status_absensi') == $status) selected @endif>
            {{ ucfirst($status) }}
        </option>
        @endforeach
    </select>
    @error('status_absensi') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>