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









Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/produk/create',[ProdukController::class, 'create']);
    Route::post('/produk',[ProdukController::class, 'store']);
    Route::get('/produk',[ProdukController::class, 'index'])->name('produk.index');
    Route::get('/produk/{id}/edit', [ProdukController::class, 'edit']);
    Route::put('/produk/{id}', [ProdukController::class, 'update']);
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy']);

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








Auth::routes(); 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
