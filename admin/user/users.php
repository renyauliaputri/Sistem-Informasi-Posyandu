<?php
require "../../auth/cek_admin.php";
require "../../config/koneksi.php";

$data = mysqli_query($koneksi, "SELECT * FROM user ORDER BY id DESC");

?>
<script src="https://cdn.tailwindcss.com"></script>

<?php include "../layout/sidebar.php "; ?>
<main class="flex-1 p-6">

<div class="bg-white p-4 rounded shadow mb-6 flex justify-between">
        <h1 class="text-xl font-bold">Dashboard Admin</h1>
        <span>👋 <?= $_SESSION['nama']; ?></span>
    </div>
    
<div class="bg-white p-6 rounded shadow">

    <div class="flex justify-between mb-4">
        <h1 class="text-xl font-bold">Data Pengguna</h1>
        <a href="tambah.php" class="bg-blue-600 text-white px-4 py-2 rounded">
            + Tambah User
        </a>
    </div>

    <table class="w-full border">
        <tr class="bg-gray-200">
            <th class="border p-2">No</th>
            <th class="border p-2">Email</th>
            <th class="border p-2">Nama</th>
            <th class="border p-2">Role</th>
            <th class="border p-2">Aksi</th>
        </tr>

        <?php $no=1; while($r=mysqli_fetch_assoc($data)): ?>
        <tr>
            <td class="border p-2"><?= $no++; ?></td>
            <td class="border p-2"><?= $r['email']; ?></td>
            <td class="border p-2"><?= $r['fullname']; ?></td>
            <td class="border p-2">
                <span class="px-2 py-1 rounded text-white
                    <?= $r['role']=='admin' ? 'bg-blue-600' : 'bg-green-600'; ?>">
                    <?= $r['role']; ?>
                </span>
            </td>
            <td class="border p-2 space-x-2">
                <a href="edit.php?id=<?= $r['id']; ?>" class="text-blue-600">Edit</a>
                <a href="hapus.php?id=<?= $r['id']; ?>"
                   onclick="return confirm('Hapus user?')"
                   class="text-red-600">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

</div>
</main>

