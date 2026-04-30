<?php
require "../../auth/cek_admin.php";
require "../../config/koneksi.php";

$data = mysqli_query($koneksi, "SELECT * FROM balita ORDER BY id DESC");

require "../../layout/header.php";
require "../../layout/sidebar.php";
?>

<main class="flex-1 p-6">

<div class="bg-white p-4 rounded shadow mb-6 flex justify-between">
        <h1 class="text-xl font-bold">Dashboard Admin</h1>
        <span>👋 <?= $_SESSION['nama']; ?></span>
    </div>
    
<div class="bg-white p-6 rounded shadow">

    <div class="flex justify-between mb-4">
        <h1 class="text-xl font-bold">Data Balita</h1>
        <a href="tambah.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Tambah Balita
        </a>
    </div>

    <table class="w-full border">
        <tr class="bg-gray-200">
            <th class="border p-2">No</th>
            <th class="border p-2">Nama Balita</th>
            <th class="border p-2">Tanggal Lahir</th>
            <th class="border p-2">Jenis Kelamin</th>
            <th class="border p-2">Nama Ayah</th>
            <th class="border p-2">Nama Ibu</th>
            <th class="border p-2">Alamat</th>
            <th class="border p-2">Aksi</th>
        </tr>

        <?php $no=1; while($row = mysqli_fetch_assoc($data)): ?>
        <tr>
            <td class="border p-2"><?= $no++; ?></td>
            <td class="border p-2"><?= $row['nama_balita']; ?></td>
            <td class="border p-2"><?= $row['tanggal_lahir']; ?></td>
            <td class="border p-2"><?= $row['jenis_kelamin']; ?></td>
            <td class="border p-2"><?= $row['nama_ayah']; ?></td>
            <td class="border p-2"><?= $row['nama_ibu']; ?></td>
            <td class="border p-2"><?= $row['alamat']; ?></td>
            <td class="border p-2 space-x-2">
                <a href="edit.php?id=<?= $row['id']; ?>" class="text-blue-600">Edit</a>
                <a href="hapus.php?id=<?= $row['id']; ?>"
                   onclick="return confirm('Yakin hapus?')"
                   class="text-red-600">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

</div>
</main>

<?php require "../layout/footer.php"; ?>
