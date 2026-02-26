<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa - Tugas Mandiri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; padding: 20px; }
        .table-container { background-color: white; border-radius: 10px; box-shadow: 0 0 20px rgba(0,0,0,0.1); padding: 25px; margin-top: 20px; }
        .btn-edit { background-color: #198754; color: white; }
        .btn-delete { background-color: #dc3545; color: white; }
    </style>
</head>
<body>
    <div class="container">
        <div class="table-container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Data Mahasiswa</h2>
                <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">
                    <i class="bi bi-person-plus-fill"></i> Tambah Mahasiswa
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Mata Kuliah</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1 @endphp
                        @foreach($mahasiswas as $mahasiswa)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td><strong>{{ $mahasiswa->nim }}</strong></td>
                            <td>{{ $mahasiswa->nama }}</td>
                            <td><span class="badge bg-primary">{{ $mahasiswa->kelas }}</span></td>
                            <td>{{ $mahasiswa->matakuliah->nama_mk ?? 'Belum Pilih MK' }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('mahasiswa.edit', $mahasiswa->nim) }}" class="btn btn-sm btn-edit">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>

                                    <form action="{{ route('mahasiswa.destroy', $mahasiswa->nim) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE') <button type="submit" class="btn btn-sm btn-delete" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            <i class="bi bi-trash-fill"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        @if(count($mahasiswas) == 0)
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">Belum ada data mahasiswa.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>