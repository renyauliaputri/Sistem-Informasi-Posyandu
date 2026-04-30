<?php
require "../../auth/cek_admin.php";
require "../../config/koneksi.php";

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM balita WHERE id='$id'"));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // ambil input, default kosong jika tidak diisi
    $nama_balita   = $_POST['nama_balita'] ?? '';
    $tanggal_lahir = $_POST['tanggal_lahir'] ?? '';
    $jenis_kelamin = $_POST['jenis_kelamin'] ?? '';
    $nama_ayah     = $_POST['nama_ayah'] ?? '';
    $nama_ibu      = $_POST['nama_ibu'] ?? '';
    $alamat        = $_POST['alamat'] ?? '';

    // prepared statement aman
    $stmt = $koneksi->prepare("UPDATE balita SET nama_balita=?, tanggal_lahir=?, jenis_kelamin=?, nama_ayah=?, nama_ibu=?, alamat=? WHERE id=?");
    $stmt->bind_param("ssssssi", $nama_balita, $tanggal_lahir, $jenis_kelamin, $nama_ayah, $nama_ibu, $alamat, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit balita</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

<div class="bg-white p-6 rounded shadow w-96 mx-auto">
<h1 class="text-xl font-bold mb-4">Edit balita</h1>

<form method="POST" class="space-y-3">
    <input name="nama_balita" value="<?= htmlspecialchars($data['nama_balita']); ?>" class="w-full border p-2 rounded" placeholder="Nama Balita">
    <input type="date" name="tanggal_lahir" value="<?= htmlspecialchars($data['tanggal_lahir']); ?>" class="w-full border p-2 rounded" placeholder="Tanggal Lahir">
    <select name="jenis_kelamin" class="w-full border p-2 rounded">
        <option value="Laki-laki" <?= $data['jenis_kelamin']=='Laki-laki'?'selected':'' ?>>Laki-laki</option>
        <option value="Perempuan" <?= $data['jenis_kelamin']=='Perempuan'?'selected':'' ?>>Perempuan</option>
    </select>
    <input name="nama_ayah" value="<?= htmlspecialchars($data['nama_ayah']); ?>" class="w-full border p-2 rounded" placeholder="Nama Ayah">
    <input name="nama_ibu" value="<?= htmlspecialchars($data['nama_ibu']); ?>" class="w-full border p-2 rounded" placeholder="Nama Ibu">
    <input name="alamat" value="<?= htmlspecialchars($data['alamat']); ?>" class="w-full border p-2 rounded" placeholder="Alamat">

    <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    <a href="index.php" class="text-gray-600">Kembali</a>
</form>
</div>

</body>
</html>
