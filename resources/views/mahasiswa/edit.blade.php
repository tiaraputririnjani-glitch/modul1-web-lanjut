<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow border-0">
                    <div class="card-header bg-warning text-dark fw-bold">
                        Form Edit Data Mahasiswa
                    </div>
                    
                    <div class="card-body p-4">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div> [cite: 43-51]
                        @endif

                        <form action="{{ route('mahasiswa.update', $mahasiswa->nim) }}" method="POST">
                            @csrf
                            @method('PUT') <div class="mb-3">
                                <label class="form-label fw-bold">NIM (Primary Key)</label>
                                <input type="text" name="nim" class="form-control bg-light" value="{{ $mahasiswa->nim }}" readonly>
                                <small class="text-muted italic">* NIM tidak dapat diubah</small>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" value="{{ old('nama', $mahasiswa->nama) }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Kelas</label>
                                <input type="text" name="kelas" class="form-control" value="{{ old('kelas', $mahasiswa->kelas) }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Mata Kuliah</label>
                                <input type="text" name="matakuliah" class="form-control" value="{{ old('matakuliah', $mahasiswa->matakuliah) }}" required>
                            </div>
                            
                            <hr>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary px-4">Kembali</a>
                                <button type="submit" class="btn btn-warning px-4 fw-bold">Update Data</button>
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