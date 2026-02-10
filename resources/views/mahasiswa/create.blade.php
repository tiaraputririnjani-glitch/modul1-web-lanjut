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

                        <form action="{{ route('matakuliah.store') }}" method="POST">
                            @csrf
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold">Kode Mata Kuliah</label>
                                <input type="text" name="kode_mk" class="form-control" placeholder="Contoh: MK001" value="{{ old('kode_mk') }}" required>
                                <div class="form-text">Kode ini harus unik dan tidak boleh sama.</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama Mata Kuliah</label>
                                <input type="text" name="nama_mk" class="form-control" placeholder="Masukkan nama mata kuliah" value="{{ old('nama_mk') }}" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">SKS (1 - 6)</label>
                                    <input type="number" name="sks" class="form-control" min="1" max="6" value="{{ old('sks') }}" required>
                                    <div class="form-text text-danger">* Maksimal 6 SKS sesuai aturan.</div> 
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Semester</label>
                                    <input type="number" name="semester" class="form-control" min="1" max="8" value="{{ old('semester') }}" required>
                                </div>
                            </div>

                            <hr>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary px-4">Kembali</a>
                                <button type="submit" class="btn btn-success px-4 fw-bold">Simpan Mata Kuliah</button>
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