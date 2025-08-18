<h2>Tambah Mahasiswa</h2>
@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

@if($errors->any())
    <ul style="color: red">
        @foreach ($errors->all() as $error )
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="/mahasiswa" method="POST">
    @csrf
    <input type="text" name="nama" placeholder="Masukkan nama..." value="{{ old('nama') }}">
    <br>
    <input type="text" name="nim" placeholder="Masukkan NIM..." value="{{ old('nim') }}">
    <br>
    <input type="text" name="jurusan" placeholder="Masukkan jurusan..." value="{{ old('jurusan') }}">
    <br>
    <button type="submit">submit</button>
</form>