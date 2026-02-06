<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow p-4">
            <h2>Tambah Data Mahasiswa</h2>
            <form action="{{ route('mahasiswa.store') }}" method="POST">
    @csrf 



<a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary"></a>
                @csrf
                <div class="mb-3">
                    <label>NIM</label>
                    <input type="text" name="nim" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Kelas</label>
                    <input type="text" name="kelas" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Mata Kuliah</label>
                    <input type="text" name="matakuliah" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan Data</button>
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</body>
</html>