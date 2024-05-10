<!DOCTYPE html>
<html>
<head>
    <title>Edit Kota</title>
</head>
<body>
    <h2>Edit Kota</h2>
    <form method="post" action="{{ route('kota.update', $kota->id) }}">
        @csrf
        @method('PUT')
        <label for="judul">Judul:</label><br>
        <input type="text" id="judul" name="judul" value="{{ $kota->judul }}"><br>

        <!-- Tambahkan input untuk field lainnya sesuai kebutuhan -->

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
