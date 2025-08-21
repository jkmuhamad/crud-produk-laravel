@extends('layouts.app')
    

@section('title','Beranda')

@section('content')
<h2 class="mb-4">Daftar Produk</h2>


<form action="{{ route('produk.index') }}" method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" name="search" value="{{ $search ?? '' }}" class="form-control" placeholder="Cari produk...">
        <button class="btn btn-primary" type="submit">Cari</button>
    </div>
    
</form>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif


<a href="/produk/create" class="btn btn-primary btn-sm mb-3">+ Tambah Produk</a>



@if(count($produks) > 0)
    <table class="table table-bordered table-striped table-hover align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Gambar</th>
                <th>Kategori</th>
                <th>Tags</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produks as $produk)
                <tr>
                    <td>{{ $produk->nama }}</td>
                    <td>Rp{{  number_format($produk->harga)  }}</td>
                    <td>{{ $produk->stok }}</td>
                    <td>
                        @if($produk->gambar)
                            <img src="{{ asset('storage/' . $produk->gambar) }}" alt="Gambar produk" width="100px">
                        @else
                            <p>Tidak ada gambar</p>
                        @endif
                    </td>
                    <td>{{ $produk->kategori->nama }}</td>
                    <td>{{ $produk->tags->pluck('nama')->join(', ') }}</td>
                    <td>
                        {{-- ini aksi untuk update data --}}
                        <a href="/produk/{{ $produk->id }}/edit" class="btn btn-warning btn-sm me-2">Edit</a>

                        {{-- ini aksi untuk hapus produk--}}
                        <form action="/produk/{{ $produk->id }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>            
            @endforeach 
        </tbody>
       
    </table>
    {{-- pagination --}}
    {{ $produks->links('pagination::bootstrap-5') }}
@else
    <div class="alert alert-info">Belum ada produk</div>
@endif

@endsection
