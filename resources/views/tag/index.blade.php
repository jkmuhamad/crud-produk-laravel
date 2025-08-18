@extends('layouts.app')
@section('title', 'Tag')

@section('content')
<h2 class="mb-4">Data Tag</h2>
@if(session('success'))
   <div class="alert alert-success">
        {{ session('success') }}
   </div>
@endif

<a class="btn btn-primary btn-sm mb-4" href="tag/create">+ Tambah Data</a>

@if(count($tags) > 0)
    <table class="table table-bordered table-striped table-hover align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th>Nama Tag</th>
                <th>Aksi</th>
            </tr>
        </thead>
        
        @foreach ($tags as $tag)
            <tr>
                <td>{{ $tag->nama }}</td>
                <td>
                    <a href="/tag/{{ $tag->id }}/edit" class="btn btn-warning">Edit</a>
                    <form action="/tag/{{ $tag->id }}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                         <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                   
                </td>
            </tr>            
        @endforeach 
    </table>
@else
    <div class="alert alert-info">Belum ada produk</div>
@endif
@endsection