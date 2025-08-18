<head>
    <style>
        table,th,td {
            border: solid 1px black
        }

        th,td{
            padding: 20px
        }

        .tambah-data{
            background-color: blue;
            width: max-content;
            padding: 20px;
            margin-top: 20px
        }
        .tambah-data a{
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<h2>Data Mahasiswa</h2>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

@if(count($mahasiswas) > 0)
    <table>
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
        @foreach ($mahasiswas as $mahasiswa )
            <tr>
                <td>{{ $mahasiswa->nama }}</td>
                <td>{{ $mahasiswa->nim }}</td>
                <td>{{ $mahasiswa->jurusan }}</td>
                <td>
                    <a href="/mahasiswa/{{ $mahasiswa->id }}/edit">Edit</a>

                    <form action="/mahasiswa/{{ $mahasiswa->id }}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@else
    <p>Data tidak tersedia</p>
@endif
<div class="tambah-data">
    <a href="/mahasiswa/create">Tambah data</a>
</div>