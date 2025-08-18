@extends('layouts.app')
@section('title', 'Tambah Kategori')

@section('content')
<h2 class="mb-4">Tambah Kategori</h2>

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form class="p-4 border rounded shadow-sm" action="/kategori" method="POST">
    @csrf
    <div class="mb-4">
        <label for="nama" class="form-label">Nama</label>
        <input class="form-control" type="text" name="nama" placeholder="Masukkan nama kategori..." value="{{ old('nama') }}">
    </div>
    <button class="btn btn-success" type="submit">Simpan</button>
</form>
@endsection