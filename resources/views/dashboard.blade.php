@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Selamat datang, {{ Auth::user()->name }} 👋</h1>
        <p>Email: {{ Auth::user()->email }}</p>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card bg-primary text-white text-center p-4">
                    <h3>{{ $totalProduk }}</h3>
                    <p>Total Produk</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-success text-white text-center p-4">
                    <h3>{{ $totalKategori }}</h3>
                    <p>Total Kategori</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-warning text-white text-center p-4">
                    <h3>{{ $totalTag }}</h3>
                    <p>Total Tag</p>
                </div>
            </div>
        </div>
    </div>
@endsection