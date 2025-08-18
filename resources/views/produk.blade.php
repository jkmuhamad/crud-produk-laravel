<h2>Daftar Produk</h2>

<ul>
    @foreach ($produks as $produk )
        <li>{{ $produk->nama }} - Rp{{ number_format($produk->harga) }} - {{ $produk->stok }}</li>
    @endforeach
</ul>