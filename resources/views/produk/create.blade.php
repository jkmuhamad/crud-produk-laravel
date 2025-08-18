@extends('layouts.app')
@section('title', 'Tambah Produk')

@section('content')
<h2 class="mb-4">Tambah data produk</h2>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>

@endif

@if($errors->any())
<div class="alert alert-danger" role="alert">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
    
@endif

<form action="/produk" method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow-sm">
    @csrf
    
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan nama...">
    </div>
    <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="text" name="harga" id="harga" class="form-control" placeholder="Masukkan harga...">  
    </div>
    <div class="mb-3">
        <label for="stok" class="form-label">Stok</label>
        <input type="text" name="stok" id="stok" class="form-control" placeholder="Masukkan stok...">
    </div>
    <div class="mb-3">
        <label for="gambar" class="form-label">Gambar</label>
        <input  class="form-control" type="file" name="gambar" id="gambar">
    </div>
    <div class="mb-3">
        <select name="kategori_id" class="form-select mb-3" >
        <option selected>Pilih Kategori</option>
        @foreach ($kategoris as $kategori)
            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
        @endforeach
    </div>
    
    </select>
    <div class="mb-3">
        <label>Tags:</label><br>
            @foreach ($tags as $tag)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="{{ $tag->id }}">
                    <label class="form-check-label" for="{{ $tag->id }}">{{ $tag->nama }}</label>
                </div>
            @endforeach 
    </div>
    <button class="btn btn-success" type="submit">Simpan</button>
</form>
@endsection