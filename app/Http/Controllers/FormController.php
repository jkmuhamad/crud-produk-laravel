<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function tampilForm(){
        return view('form');
    }

    public function simpanData(Request $request){
        $nama = $request->nama_produk;
        $harga = $request->harga;
        $stok = $request->stok;
        return 'Produk: '.$nama.' - '.' Harga: '.$harga. ' - '.' Stok: '. ' - '. $stok  ;
    }
}
