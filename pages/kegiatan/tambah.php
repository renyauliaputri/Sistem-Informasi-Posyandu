<?php
if(isset($_POST['simpan'])){

    $tanggal = $_POST['tanggal'];
    $lokasi = $_POST['lokasi'];
    $keterangan = $_POST['keterangan'];

    mysqli_query($connect, "
        INSERT INTO kegiatan_posyandu
        (tanggal_kegiatan, lokasi, keterangan)
        VALUES ('$tanggal','$lokasi','$keterangan')
    ");

    echo "<script>
        alert('Kegiatan berhasil ditambahkan');
        window.location='dashboard_kader.php?page=kegiatan';
    </script>";
}
?>

<main class="flex-1 p-6">
<div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow-lg border">

<h1 class="text-2xl font-bold text-green-600 mb-6">
➕ Tambah Kegiatan
</h1>

<form method="POST" class="space-y-4">

<div>
<label class="block mb-1 font-semibold">Tanggal Kegiatan</label>
<input type="date" name="tanggal" required
class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-400 outline-none">
</div>

<div>
<label class="block mb-1 font-semibold">Lokasi</label>
<input type="text" name="lokasi" required
class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-400 outline-none">
</div>

<div>
<label class="block mb-1 font-semibold">Keterangan</label>
<textarea name="keterangan" rows="4"
class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-400 outline-none"></textarea>
</div>

<div class="flex justify-end gap-2">
<a href="dashboard_kader.php?page=kegiatan"
class="px-4 py-2 border rounded-lg">
Batal
</a>

<button type="submit" name="simpan"
class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg shadow">
Simpan
</button>
</div>

</form>

</div>
</main>