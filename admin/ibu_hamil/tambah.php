<?php
require "../../auth/cek_admin.php";
require "../../config/koneksi.php";

if ($_SERVER['REQUEST_METHOD']=='POST') {
    mysqli_query($koneksi, "
        INSERT INTO user (nama_ibu, tanggal_lahihr, alamat,  usia_kehamilan, )
        VALUES (
            '$_POST[nama]',
            '$_POST[tanggal_lahir]',
            '$_POST[alamat]',
            '$_POST[usia_kehamilan]'
        )
    ");
    header("Location: index.php");
}

include "../../layout/header.php";
include "../../layout/sidebar.php";
?>

<main class="flex-1 p-6">
<div class="bg-white p-6 rounded shadow w-96 mx-auto">

<h1 class="text-xl font-bold mb-4">Tambah Data Ibu Hamil</h1>

<form method="POST" class="space-y-3">
    <input name="nama" type="nama" placeholder="nama"
           class="w-full border p-2 rounded" required>

    <input name="tanggal_lahir" type="DATE" placeholder="tanggal lahir"
           class="w-full border p-2 rounded" required>

    <input name="alamat" placeholder="alamat"
           class="w-full border p-2 rounded" required>

           <input name="usia_kehamilan" placeholder="usia kehamilan"
           class="w-full border p-2 rounded" required>

    <button class="bg-blue-600 text-white px-4 py-2 rounded">
        Simpan
    </button>
    <a href="index.php" class="text-gray-600 ml-2">Kembali</a>
</form>

</div>
</main>

<?php require "../../layout/footer.php"; ?>
