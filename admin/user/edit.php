<?php
require "../../auth/cek_admin.php";
require "../../config/koneksi.php";

$id = $_GET['id'];
$data = mysqli_fetch_assoc(
    mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id'")
);

if ($_SERVER['REQUEST_METHOD']=='POST') {

    if ($_POST['password'] != "") {
        mysqli_query($koneksi, "
            UPDATE user SET
            email='$_POST[email]',
            password='$_POST[password]',
            fullname='$_POST[fullname]',
            role='$_POST[role]'
            WHERE id='$id'
        ");
    } else {
        mysqli_query($koneksi, "
            UPDATE user SET
            email='$_POST[email]',
            fullname='$_POST[fullname]',
            role='$_POST[role]'
            WHERE id='$id'
        ");
    }

    header("Location: index.php");
}

require "../layout/header.php";
require "../layout/sidebar.php";
?>

<main class="flex-1 p-6">
<div class="bg-white p-6 rounded shadow w-96 mx-auto">

<h1 class="text-xl font-bold mb-4">Edit User</h1>

<form method="POST" class="space-y-3">
    <input name="email" value="<?= $data['email']; ?>"
           class="w-full border p-2 rounded">

    <input name="password" type="password"
           placeholder="Password (kosongkan jika tidak diubah)"
           class="w-full border p-2 rounded">

    <input name="fullname" value="<?= $data['fullname']; ?>"
           class="w-full border p-2 rounded">

    <select name="role" class="w-full border p-2 rounded">
        <option value="admin" <?= $data['role']=='admin'?'selected':''; ?>>
            Admin
        </option>
        <option value="kader" <?= $data['role']=='kader'?'selected':''; ?>>
            Kader
        </option>
    </select>

    <button class="bg-blue-600 text-white px-4 py-2 rounded">
        Update
    </button>
    <a href="index.php" class="text-gray-600 ml-2">Kembali</a>
</form>

</div>
</main>

<?php require "../layout/footer.php"; ?>
