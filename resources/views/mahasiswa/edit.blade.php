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
    @method('PUT') <input type="text" name="nama" value="{{ $mahasiswa->nama }}" class="form-control">
    <input type="text" name="kelas" value="{{ $mahasiswa->kelas }}" class="form-control">

    <select name="matakuliah_id" class="form-control">
        @foreach($data_mk as $mk)
            <option value="{{ $mk->id }}" {{ $mahasiswa->matakuliah_id == $mk->id ? 'selected' : '' }}>
                {{ $mk->nama_mk }}
            </option>
        @endforeach
    </select>

    <button type="submit" class="btn btn-primary">Update Data</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>