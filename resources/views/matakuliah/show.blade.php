<h3>Daftar Mahasiswa Mata Kuliah: {{ $mk->nama_mk }}</h3>
<table class="table">
    <tr><th>NIM</th><th>Nama</th></tr>
    @foreach($mk->mahasiswas as $mhs)
        <tr>
            <td>{{ $mhs->nim }}</td>
            <td>{{ $mhs->nama }}</td>
        </tr>
    @endforeach
</table>