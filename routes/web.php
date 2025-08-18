<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TagController;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;
use function Laravel\Prompts\form;


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/about', function (){
    return view('about');
});

Route::get('/form', function(){
    return '
    <form action="/kirim" method="POST">
        ' . csrf_field() . '
        <input type="text" name="nama">
        <button type="submit">Kirim</button>
    </form>';
});

Route::post('/kirim', function(Request $request){
    return 'Data yang dikirim: '. $request->nama ;
});

Route::get('/profil', function(){
    return 'Ini halaman profil';
});

Route::get('/formulir', [FormController::class, 'tampilForm']);
Route::POST('/simpan-produk', [FormController::class, 'simpanData']);


Route::post('/submit-formulir', function(Request $request){
    return 'Halo '. $request->nama .' Umurmu ' . $request->umur;
});

Route::get('/beranda', function(){
    return view('beranda');
});





Route::get('/cari', function(){
    return view('cari');
});
Route::get('/cari-produk', function(Request $request){
    $query = $request->q;
    return'Hasil pencarian untuk '.$query ;
});

Route::get('/kontak', [KontakController::class,'tampilForm']);
Route::post('/simpan-kontak',[KontakController::class, 'simpanKontak']);

Route::get('/tambah-produk', function (){
    $produk = new Produk;
    $produk->nama ="Laptop";
    $produk->harga =10000000;
    $produk->stok = 5;
    $produk->save();
    return 'Produk disimpan';
});

Route::get('/semua-produk', function(){
    $data = Produk::all();
    return view('produk',['produks' => $data]);
});

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/produk/create',[ProdukController::class, 'create']);
    Route::post('/produk',[ProdukController::class, 'store']);
    Route::get('/produk',[ProdukController::class, 'index'])->name('produk.index');
    Route::get('/produk/{id}/edit', [ProdukController::class, 'edit']);
    Route::put('/produk/{id}', [ProdukController::class, 'update']);
    Route::delete('/produk{id}', [ProdukController::class, 'destroy']);

    Route::get('/kategori/create',[KategoriController::class, 'create']);
    Route::post('/kategori',[KategoriController::class, 'store']);
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit']);
    Route::put('/kategori/{id}', [KategoriController::class, 'update']);
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy']);

    Route::get('/tag/create', [TagController::class, 'create']);
    Route::post('/tag', [TagController::class, 'store']);
    Route::get('/tag', [TagController::class, 'index']);
    Route::get('/tag/{id}/edit', [TagController::class, 'edit']);
    Route::put('/tag/{id}', [TagController::class, 'update']);
    Route::delete('/tag/{id}',[TagController::class, 'destroy']);

});


Route::get('/mahasiswa/create', [MahasiswaController::class,'create']);
Route::post('/mahasiswa', [MahasiswaController::class, 'store']);
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit']);
Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update']);
Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy']);





Auth::routes(); 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
