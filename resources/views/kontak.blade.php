<form action="/simpan-kontak" method="POST">
    @csrf
    <input type="text" name="nama" placeholder="Masukkan nama...">
    <br>
    <input type="email" name="email" placeholder="Masukkan email...">
    <br>
    <input type="text" name="pesan" placeholder="Masukkan pesan...">
    <br>
    <button type="submit">Simpan</button>
</form>