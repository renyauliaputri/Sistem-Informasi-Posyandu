<?php
require "../../auth/cek_admin.php";
require "../../config/koneksi.php";

$data = mysqli_query($koneksi, "SELECT * FROM ibu_hamil ORDER BY id DESC");

require "../layout/header.php";
require "../layout/sidebar.php";
?>

<main class="flex-1 p-6">

<div class="bg-white p-4 rounded shadow mb-6 flex justify-between">
        <h1 class="text-xl font-bold">Dashboard Admin</h1>
        <span>👋 <?= $_SESSION['nama']; ?></span>
    </div>
    
<div class="bg-white p-6 rounded shadow">
    <div class="flex justify-between mb-4">
        <h1 class="text-xl font-bold">Data Ibu Hamil</h1>
        <a href="tambah.php"
           class="bg-blue-600 text-white px-4 py-2 rounded">
           + Tambah
        </a>
    </div>

    <table class="w-full border">
        <tr class="bg-gray-200">
            <th class="border p-2">No</th>
            <th class="border p-2">Nama</th>
            <th class="border p-2">Alamat</th>
            <th class="border p-2">Usia Kehamilan</th>
            <th class="border p-2">Aksi</th>
        </tr>

        <?php $no=1; while($r=mysqli_fetch_assoc($data)): ?>
        <tr>
            <td class="border p-2"><?= $no++; ?></td>
            <td class="border p-2"><?= $r['nama_ibu']; ?></td>
            <td class="border p-2"><?= $r['alamat']; ?></td>
            <td class="border p-2"><?= $r['usia_kehamilan']; ?> minggu</td>
            <td class="border p-2">
                <a href="edit.php?id=<?= $r['id']; ?>" class="text-blue-600">Edit</a>
                |
                <a href="hapus.php?id=<?= $r['id']; ?>"
                   onclick="return confirm('Hapus data?')"
                   class="text-red-600">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

</main>

<?php require "../layout/footer.php"; ?>
