<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function tampilForm(){
        return view('kontak');
    }

    public function simpanKontak(Request $request){
        $nama = $request->nama;
        $email =$request->email;
        $pesan = $request->pesan;
        return "<ul>
        <li>Nama: $nama</li>
        <li>Email: $email</li>
        <li>Pesan: $pesan</li>
        </ul>";
     }
}
