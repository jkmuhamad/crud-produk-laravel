<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Produk;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Mahasiswa::all();
        return view('mahasiswa.index', ['mahasiswas' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|numeric',
            'jurusan' => 'required|min:3'
        ]);

        $mahasiswa = new Mahasiswa();
        $mahasiswa->nama = $request->nama;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->jurusan = $request->jurusan;
        $mahasiswa->save();

        return redirect('/mahasiswa')->with('success', 'Data berhasil disimipan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findorFail($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|numeric',
            'jurusan' => 'required|min:3'
        ]);

        $mahasiswa = Mahasiswa::findorFail($id);
        $mahasiswa->nama = $request->nama;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->jurusan = $request->jurusan;
        $mahasiswa->save();

        return redirect('/mahasiswa')->with('success','Data berhasil di update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findorFail($id);
        $mahasiswa->delete();

        return redirect('/mahasiswa')->with('success','Data berhasil dihapus!');
    }
}
