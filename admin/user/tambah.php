<?php
require "../../auth/cek_admin.php";
require "../../config/koneksi.php";

if ($_SERVER['REQUEST_METHOD']=='POST') {
    mysqli_query($koneksi, "
        INSERT INTO user (email, password, fullname, role)
        VALUES (
            '$_POST[email]',
            '$_POST[password]',
            '$_POST[fullname]',
            '$_POST[role]'
        )
    ");
    header("Location: index.php");
}

?>
<script src="https://cdn.tailwindcss.com"></script>

<main class="flex-1 p-6">
<div class="bg-white p-6 rounded shadow w-96 mx-auto">

<h1 class="text-xl font-bold mb-4">Tambah User</h1>

<form method="POST" class="space-y-3">
    <input name="email" type="email" placeholder="Email"
           class="w-full border p-2 rounded" required>

    <input name="password" type="password" placeholder="Password"
           class="w-full border p-2 rounded" required>

    <input name="fullname" placeholder="Nama Lengkap"
           class="w-full border p-2 rounded" required>

    <select name="role" class="w-full border p-2 rounded" required>
        <option value="">-- Pilih Role --</option>
        <option value="admin">Admin</option>
        <option value="kader">Kader</option>
    </select>

    <button class="bg-blue-600 text-white px-4 py-2 rounded">
        Simpan
    </button>
    <a href="index.php" class="text-gray-600 ml-2">Kembali</a>
</form>

</div>
</main>

<?php require "../layout/footer.php"; ?>
