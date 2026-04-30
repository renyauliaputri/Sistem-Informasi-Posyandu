<?php
require "../../auth/cek_admin.php";
require "../../config/koneksi.php";

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM ibu_hamil WHERE id='$id'"));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    mysqli_query($koneksi, "
        UPDATE ibu_hamil SET
        nama_ibu='$_POST[nama_ibu]',
        tanggal_lahir='$_POST[tanggal_lahir]',
        alamat='$_POST[alamat]',
        usia_kehamilan='$_POST[usia_kehamilan]'
        WHERE id='$id'
    ");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Ibu Hamil</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

<div class="bg-white p-6 rounded shadow w-96 mx-auto">
<h1 class="text-xl font-bold mb-4">Edit Ibu Hamil</h1>

<form method="POST" class="space-y-3">
    <input name="nama_ibu" value="<?= $data['nama_ibu']; ?>" class="w-full border p-2 rounded">
    <input name="tanggal_lahir" value="<?= $data['tanggal_lahir']; ?>" class="w-full border p-2 rounded">
    <input name="alamat" value="<?= $data['alamat']; ?>" class="w-full border p-2 rounded">
    <input name="usia_kehamilan" value="<?= $data['usia_kehamilan']; ?>" class="w-full border p-2 rounded">

    <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    <a href="index.php" class="text-gray-600">Kembali</a>
</form>
</div>

</body>
</html>
