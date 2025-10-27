<div class="mb-3">
    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
    <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap', $employee->nama_lengkap ?? '') }}" required>
    @error('nama_lengkap') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $employee->email ?? '') }}" required>
    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
    <input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon', $employee->nomor_telepon ?? '') }}" required>
    @error('nomor_telepon') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $employee->tanggal_lahir ?? '') }}" required>
    @error('tanggal_lahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" required>{{ old('alamat', $employee->alamat ?? '') }}</textarea>
    @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="departemen_id" class="form-label">Departemen</label>
    <select class="form-select @error('departemen_id') is-invalid @enderror" id="departemen_id" name="departemen_id" required>
        <option value="">Pilih Departemen</option>
        @foreach($departments as $dept)
        <option value="{{ $dept->id }}"
            @if( (isset($employee) && $employee->departemen_id == $dept->id) || old('departemen_id') == $dept->id ) selected @endif>
            {{ $dept->nama_departemen }}
        </option>
        @endforeach
    </select>
    @error('departemen_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="jabatan_id" class="form-label">Jabatan</label>
    <select class="form-select @error('jabatan_id') is-invalid @enderror" id="jabatan_id" name="jabatan_id" required>
        <option value="">Pilih Jabatan</option>
        @foreach($positions as $pos)
        <option value="{{ $pos->id }}"
            @if( (isset($employee) && $employee->jabatan_id == $pos->id) || old('jabatan_id') == $pos->id ) selected @endif>
            {{ $pos->nama_jabatan }}
        </option>
        @endforeach
    </select>
    @error('jabatan_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="tanggal_masuk" class="form-label">Tanggal Masuk:</label>
    <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror" id="tanggal_masuk" name="tanggal_masuk" value="{{ old('tanggal_masuk', $employee->tanggal_masuk ?? '') }}" required>
    @error('tanggal_masuk') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="status" class="form-label">Status:</label>
    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
        <option value="aktif" @if( (isset($employee) && $employee->status == 'aktif') || old('status') == 'aktif' ) selected @endif>Aktif</option>
        <option value="nonaktif" @if( (isset($employee) && $employee->status == 'nonaktif') || old('status') == 'nonaktif' ) selected @endif>Nonaktif</option>
    </select>
    @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>