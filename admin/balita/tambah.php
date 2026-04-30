<?php
require "../../auth/cek_admin.php";
require "../../config/koneksi.php";

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $nama_balita = mysqli_real_escape_string($koneksi, $_POST['nama_balita']);
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nama_ayah = mysqli_real_escape_string($koneksi, $_POST['nama_ayah']);
    $nama_ibu = mysqli_real_escape_string($koneksi, $_POST['nama_ibu']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);

    mysqli_query($koneksi, "INSERT INTO balita
        (nama_balita,tanggal_lahir,jenis_kelamin,nama_ayah,nama_ibu,alamat)
        VALUES ('$nama_balita','$tanggal_lahir','$jenis_kelamin','$nama_ayah','$nama_ibu','$alamat')");
    header("Location: index.php");
}

require "../layout/header.php";
require "../layout/sidebar.php";
?>

<main class="flex-1 p-6">
<div class="bg-white p-6 rounded shadow w-96 mx-auto">

<h1 class="text-xl font-bold mb-4">Tambah Balita</h1>

<form method="POST" class="space-y-3">
    <input type="text" name="nama_balita" placeholder="Nama Balita"
           class="w-full border p-2 rounded" required>

    <input type="date" name="tanggal_lahir"
           class="w-full border p-2 rounded" required>

    <select name="jenis_kelamin" class="w-full border p-2 rounded" required>
        <option value="">Pilih Jenis Kelamin</option>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
    </select>

    <input type="text" name="nama_ayah" placeholder="Nama Ayah"
           class="w-full border p-2 rounded" required>

    <input type="text" name="nama_ibu" placeholder="Nama Ibu"
           class="w-full border p-2 rounded" required>

    <input type="text" name="alamat" placeholder="Alamat"
           class="w-full border p-2 rounded" required>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
        Simpan
    </button>
    <a href="index.php" class="text-gray-600 ml-2">Kembali</a>
</form>
