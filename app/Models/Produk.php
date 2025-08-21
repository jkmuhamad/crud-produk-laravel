<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
   protected $fillable = ['nama', 'harga', 'stok', 'kategori_id', 'tag'];

    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
