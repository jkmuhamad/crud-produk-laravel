@extends('layouts.app')
@section('title', 'Tambah Tag')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-3">
            @foreach ($errors->all(); as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<h2>Tambah tag</h2>



<form class="p-4 border rounded shadow-sm" action="/tag" method="POST">
    @csrf
    <div class="mb-4">
        <label for="nama" class="form-label">Nama</label>
        <input class="form-control " id="nama" type="text" name="nama" placeholder="Masukkan nama tag..">
    </div>
    <button class="btn btn-success btn-sm" type="submit">Simpan</button>
</form>
@endsection