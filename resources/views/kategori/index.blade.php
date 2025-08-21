@extends('layouts.app')
@section('title', 'Kategori')

@section('content')

<h2 class="mb-4">Kategori</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('kategori.index') }}" method="GET" class="mt-3">
    <div class="input-group mb-3">
        <input type="text" name="search" value="{{ $search ?? ''}}" class="form-control">
        <button class="btn btn-primary" type="submit">Cari</button>
    </div>
</form>

<a href="/kategori/create" class="btn btn-primary btn-sm mb-3">+ Tambah Kategori</a>
@if(count($kategoris) > 0 )
    <table class="table table-bordered table-striped table-hover align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th>id</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        
        @foreach ($kategoris as $kategori )
        <tr>
            <td>{{ $kategori->id }}</td>
            <td>{{ $kategori->nama }}</td>
            <td>
                <a class="btn btn-warning btn-sm me-2" href="/kategori/{{ $kategori->id }}/edit">Edit</a>
                <form action="/kategori/{{ $kategori->id }}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $kategoris->links('pagination::bootstrap-5') }}
@else
    <p>data tidak tersedia</p>
@endif

    
@endsection