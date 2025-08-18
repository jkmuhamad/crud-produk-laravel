@extends('layouts.master')

@section('title', 'Tentang Kami')

@section('content')
    <h2>Menu</h2>
    <div class="list">
        <ul>
            <li>ayam goreng</li>
            <li>rendang</li>
            <li>udang saos padang</li>
        </ul>
    </div>

    {{--komentar: ini adalah directive blade. yang saya sedang gunakan untuk latihan adalah if
     else (pengkondisian) pengkondisian disini bisa di halaman yang sama kalau di laravel menggunakan blade template ini
    @if($nilai >=80)
        <p>Nilai Kamu A</p>
    @elseif($nilai >=70)
        <p>nilai kamu B</p>
    @else
        <p>Nilai kamu C</p>
    @endif
    --}}    
    
@endsection

