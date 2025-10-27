<div class="mb-3">
    <label for="nama_jabatan" class="form-label fw-semibold">Nama Jabatan</label>
    <input type="text" class="form-control @error('nama_jabatan') is-invalid @enderror" id="nama_jabatan" name="nama_jabatan"
        value="{{ old('nama_jabatan', $position->nama_jabatan ?? '') }}" required>
    @error('nama_jabatan')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="gaji_pokok" class="form-label fw-semibold">Gaji Pokok (Rp)</label>
    <input type="number" step="1000" class="form-control @error('gaji_pokok') is-invalid @enderror" id="gaji_pokok" name="gaji_pokok"
        value="{{ old('gaji_pokok', $position->gaji_pokok ?? '') }}" required>
    @error('gaji_pokok')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>