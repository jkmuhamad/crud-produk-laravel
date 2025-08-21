<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdukRequest;
use Storage;
use App\Models\Tag;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Dflydev\DotAccessData\Data;

class ProdukController extends Controller
{

    public function index(Request $request){
        $search = $request->input('search');

        $query = Produk::with('kategori','tags');
        
        if($search) {
            $query->where('nama', 'like', "%{$search}%")
                  ->orWhere('harga','like',"%{$search}%");
        }

        $produks = $query->paginate(5);

        $produks->appends(['search' => $search]);

        return view('produk.index',compact('produks','search'));
       
    }

    public function create(){
        $kategoris = Kategori::all();
        $tags = Tag::all();
        return view('produk.create', compact('kategoris','tags'));
    }

    public function store(ProdukRequest $request){
        
        Produk::create($request->validated());

        $produk = new Produk;
        $produk->nama = $request->nama;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        
        if($request->hasFile('gambar')){
            $file = $request->file('gambar');
            $path = $file->store('gambar-produk', 'public');
            $produk->gambar = $path;
        }

        $produk->kategori_id =$request->kategori_id;
       
        $produk->save();
        //relasi many to many
        $produk->tags()->attach($request->tags);
        return redirect('/produk')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id){
        $produk = Produk::with('kategori','tags')->findorFail($id);
        $kategoris = Kategori::all();
        $tags = Tag::all();
       
        return view ('produk.edit', compact('produk','kategoris','tags'));
    }

    public function update(ProdukRequest $request, $id){


        $produk = Produk::findorFail($id);
        $produk->update($request->validated());
        $produk->nama = $request->nama;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;

        $path = $request->file('gambar')->store('gambar-produk', 'public');
        $produk->gambar = $path;

        $produk->kategori_id = $request->kategori_id;
        $produk->save();

        $produk->tags()->sync($request->tags);

        return redirect('/produk')->with('success', 'Produk berhasil diupdate!');
    }

    public function destroy($id){
        $produk = Produk::findorFail($id);
        $produk->delete();

        return redirect ('/produk')->with('success','Produk berhasil dihapus!');
    }

}
