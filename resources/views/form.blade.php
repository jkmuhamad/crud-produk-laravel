<form action="/simpan-produk" method="POST">
    @csrf
    <input type="text" name="nama_produk" placeholder="Masukkan nama barang">
    <br>
    <input type="text" name="harga" placeholder="Masukkan harga barang">
    <br>
    <input type="text" name="stok" placeholder="Masukkan Jumlah Stok">
    <br>
    <button type="submit">Simpan</button>
</form>

   