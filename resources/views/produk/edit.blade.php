@extends('layouts.app')
@section('title', 'Edit Produk')

@section('content')
<h2 class="mb-4">Tambah Produk</h2>

@if($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="/produk/{{ $produk->id }}" enctype="multipart/form-data" class="card p-4 shadow-sm" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nama Produk</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama', $produk->nama) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Harga</label>
        <input type="number" name="harga" class="form-control" value="{{ old('harga', $produk->harga) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Stok</label>
        <input type="number" name="stok" class="form-control" value="{{ old('stok', $produk->stok) }}">
    </div>
    <div class="mb-3">
        <select class="form-select " name="kategori_id" id="kategori">
            <option selected>Pilih Kategori</option>
            @foreach ($kategoris as $kategori)
                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <input class="form-control" type="file" name="gambar">
    </div>
    <div class="mb-3">
        <label>Tags:</label><br>
            @foreach ($tags as $tag)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="{{ $tag->id }}">
                    <label class="form-check-label" for="{{ $tag->id }}">{{ $tag->nama }}</label>
                </div>
            @endforeach 
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>
@endsection





