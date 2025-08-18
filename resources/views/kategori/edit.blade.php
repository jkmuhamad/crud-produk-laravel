@extends('layouts.app')
@section('title','Edit Kategori')

@section('content')
<h2 class="mb-4">Edit Produk</h2>
@if ($errors->any())
    <ul class="mb-3">
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>

    </ul>
@endif
<form class="p-4 border rounded shadow-sm" action="/kategori/{{ $kategori->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <label for="nama" class="form-label">Nama</label>
        <input class="form-control" type="text" name="nama" value="{{ old('nama', $kategori->nama) }}">
    </div>
    
    <button class="btn btn-success btn-sm" type="submit">Simpan</button>
</form>
@endsection