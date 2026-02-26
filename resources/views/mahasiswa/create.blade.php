<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow border-0">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">Form Tambah Mata Kuliah</h4>
                    </div>
                    <div class="card-body p-4">

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div> 
                        @endif

                        <form action="{{ route('mahasiswa.store') }}" method="POST">
    @csrf
    
    <div class="mb-3">
        <label class="form-label fw-bold">NIM</label>
        <input type="text" name="nim" class="form-control" placeholder="Contoh: 220101" value="{{ old('nim') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label fw-bold">Nama Mahasiswa</label>
        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap" value="{{ old('nama') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label fw-bold">Kelas</label>
        <input type="text" name="kelas" class="form-control" placeholder="Contoh: TI-A" value="{{ old('kelas') }}" required>
    </div>

    <label class="form-label fw-bold">Pilih Mata Kuliah</label>
<select name="matakuliah_id" class="form-control" required>
    <option value="">-- Pilih Mata Kuliah --</option>
    @foreach($data_mk as $mk)
        <option value="{{ $mk->id }}">{{ $mk->nama_mk }}</option>
    @endforeach
</select>

        <div class="form-text">Mahasiswa akan terhubung dengan mata kuliah yang dipilih. [cite: 6]</div>
    </div>

    <hr>
    <div class="d-flex justify-content-between">
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary px-4">Kembali</a>
        <button type="submit" class="btn btn-success px-4 fw-bold">Simpan Mahasiswa</button>
    </div>
</form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>