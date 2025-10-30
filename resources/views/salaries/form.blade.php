<div class="mb-3">
    <label for="karyawan_id" class="form-label fw-semibold">Nama Pegawai</label>
    <select class="form-select @error('karyawan_id') is-invalid @enderror" id="karyawan_id" name="karyawan_id" required>
        <option value="" disabled selected hidden>Pilih Pegawai</option>
        @foreach($employees as $employee)
        <option value="{{ $employee->id }}"
            @if(isset($salary) && $salary->karyawan_id == $employee->id) selected @endif>
            {{ $employee->nama_lengkap }} ({{ $employee->department->nama_departemen ?? 'N/A' }})
        </option>
        @endforeach
    </select>
    @error('karyawan_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="bulan" class="form-label fw-semibold">Periode Bulan/Tahun (Contoh: Okt 2025)</label>
    <input type="text" class="form-control @error('bulan') is-invalid @enderror" id="bulan" name="bulan" placeholder="Contoh: Okt 2025"
        value="{{ old('bulan', $salary->bulan ?? '') }}" required>
    @error('bulan') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="gaji_pokok" class="form-label fw-semibold">Gaji Pokok (Rp)</label>
    <input type="number" step="1000" class="form-control @error('gaji_pokok') is-invalid @enderror" id="gaji_pokok" name="gaji_pokok"
        value="{{ old('gaji_pokok', $salary->gaji_pokok ?? '') }}" required>
    @error('gaji_pokok') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="tunjangan" class="form-label fw-semibold">Tunjangan (Rp)</label>
        <input type="number" step="1000" class="form-control @error('tunjangan') is-invalid @enderror" id="tunjangan" name="tunjangan"
            value="{{ old('tunjangan', $salary->tunjangan ?? 0) }}">
        @error('tunjangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label for="potongan" class="form-label fw-semibold">Potongan (Rp)</label>
        <input type="number" step="1000" class="form-control @error('potongan') is-invalid @enderror" id="potongan" name="potongan"
            value="{{ old('potongan', $salary->potongan ?? 0) }}">
        @error('potongan') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>