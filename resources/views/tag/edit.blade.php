@extends('layouts.app')
@section('title','Edit Tag')

@section('content')
    <h2>Edit Tag</h2>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-3">
            @foreach ($errors->all(); as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form class="p-4 border rounded shadow-sm" action="/tag/{{ $tag->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="">Nama</label>
            <input class="form-control" id="nama" type="text" name="nama" value="{{ $tag->nama }}">
        </div>
       <button class="btn btn-success btn-sm" type="submit">Simpan</button>
    </form>
@endsection
