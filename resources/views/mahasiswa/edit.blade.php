<h2>Update Mahasiswa</h2>

@if($errors->any())
    <ul style="color: red">
        @foreach ($errors->all() as $error )
            <li>{{ $error }}</li>
        @endforeach
    </ul>    
@endif

<form action="/mahasiswa/{{ $mahasiswa->id }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="nama" value="{{ old('nama', $mahasiswa->nama) }}">
    <br>
    <input type="text" name="nim" value="{{ old('nim', $mahasiswa->nim) }}">
    <br>
    <input type="text" name="jurusan" value="{{ old('jurusan', $mahasiswa->jurusan) }}">
    <button type="">Update</button>
</form>