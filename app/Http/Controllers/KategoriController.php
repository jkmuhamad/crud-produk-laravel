<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Kategori::query();

        if($search){
            $query->where('nama', 'like', "%{$search}%");
        }

        $kategoris = $query->paginate(5);

        $kategoris->appends(['search' => $search]);

        return view('kategori.index',compact('kategoris', 'search'));
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        $kategori = New Kategori();
        $kategori->nama = $request->nama;
        $kategori->save();

        return redirect('/kategori')->with('success','Kategori berhasil ditambahkan !');
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
        $kategori = Kategori::findorFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        $kategori = Kategori::findorFail($id);
        $kategori->nama = $request->nama;
        $kategori->save();

        return redirect('/kategori')->with('success','data berhasil di ubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::findorFail();
        $kategori->delete();
        
        return redirect('/kategori')->with('success', 'Data berhasil dihapus!');
    }
}
