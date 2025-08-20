<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tag::all();
        return view('tag.index',['tags' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        Tag::create($request->validated());

        $tag = new Tag();
        $tag->nama = $request->nama;
        $tag->save();

        return redirect('/tag')->with('success', 'Tag berhasil disimpan!');
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
    public function edit( $id)
    {
        $tag = Tag::findorFail($id);
        return view('tag.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, $id)
    {
        $tag = Tag::findorFail($id);
        $tag->update($request->validated());
        $tag->nama = $request->nama;
        $tag->save();

        return redirect('/tag')->with('success', 'Tag berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $tag = Tag::findorFail($id);
        $tag->delete();

        return redirect('/tag')->with('success', 'Tag berhasil dihapus!');
    }
}
