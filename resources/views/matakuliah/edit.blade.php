<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow p-4">
            <h2 class="mb-4">Edit Data Mata Kuliah</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('matakuliah.update', $mk->kode_mk) }}" method="POST">
                @csrf
                @method('PUT') <div class="mb-3">
                    <label class="form-label fw-bold">Kode MK (Kunci Utama)</label>
                    <input type="text" class="form-control bg-light" value="{{ $mk->kode_mk }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Mata Kuliah</label>
                    <input type="text" name="nama_mk" class="form-control" value="{{ old('nama_mk', $mk->nama_mk) }}" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">SKS (1-6)</label>
                        <input type="number" name="sks" class="form-control" value="{{ old('sks', $mk->sks) }}" min="1" max="6" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Semester</label>
                        <input type="number" name="semester" class="form-control" value="{{ old('semester', $mk->semester) }}" required>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-warning px-4 fw-bold">Update Data</button>
                    <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary px-4">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>