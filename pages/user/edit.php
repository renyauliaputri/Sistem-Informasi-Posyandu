<?php
$id = $_GET['id'];
$data = mysqli_fetch_assoc(
    mysqli_query($connect, "SELECT * FROM user WHERE id='$id'")
);

if ($_SERVER['REQUEST_METHOD']=='POST') {

    if ($_POST['password'] != "") {
        mysqli_query($connect, "
            UPDATE user SET
            email='$_POST[email]',
            password='$_POST[password]',
            fullname='$_POST[fullname]',
            role='$_POST[role]'
            WHERE id='$id'
        ");
    } else {
        mysqli_query($connect, "
            UPDATE user SET
            email='$_POST[email]',
            fullname='$_POST[fullname]',
            role='$_POST[role]'
            WHERE id='$id'
        ");
    }

    header("Location: dashboard_admin.php?page=user");
}

?>

<!-- BOXICONS -->
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<main class="p-6 bg-gray-100">

<div class="max-w-xl mx-auto">

    <div class="bg-white p-6 rounded-2xl shadow-lg">

        <!-- HEADER -->
        <div class="mb-6">
            <h1 class="text-xl font-semibold text-gray-700 flex items-center gap-2">
                <i class='bx bx-edit text-2xl text-yellow-500'></i>
                Edit User
            </h1>
            <p class="text-sm text-gray-500">Perbarui data pengguna</p>
        </div>

        <!-- FORM -->
        <form method="POST" class="space-y-5">

            <!-- EMAIL -->
            <div>
                <label class="text-sm text-gray-600">Email</label>
                <div class="flex items-center border rounded-xl px-3 mt-1 focus-within:ring-2 focus-within:ring-blue-500">
                    <i class='bx bx-envelope text-gray-400 text-lg'></i>
                    <input name="email" 
                        value="<?= $data['email']; ?>"
                        class="w-full px-2 py-2 outline-none"
                        required>
                </div>
            </div>

            <!-- PASSWORD -->
            <div>
                <label class="text-sm text-gray-600">Password</label>
                <div class="flex items-center border rounded-xl px-3 mt-1 focus-within:ring-2 focus-within:ring-blue-500">
                    <i class='bx bx-lock text-gray-400 text-lg'></i>
                    <input name="password" type="password"
                        placeholder="Kosongkan jika tidak diubah"
                        class="w-full px-2 py-2 outline-none">
                </div>
                <p class="text-xs text-gray-400 mt-1">Biarkan kosong jika tidak ingin mengubah password</p>
            </div>

            <!-- NAMA -->
            <div>
                <label class="text-sm text-gray-600">Nama Lengkap</label>
                <div class="flex items-center border rounded-xl px-3 mt-1 focus-within:ring-2 focus-within:ring-blue-500">
                    <i class='bx bx-user text-gray-400 text-lg'></i>
                    <input name="fullname"
                        value="<?= $data['fullname']; ?>"
                        class="w-full px-2 py-2 outline-none"
                        required>
                </div>
            </div>

            <!-- ROLE -->
            <div>
                <label class="text-sm text-gray-600">Role</label>
                <div class="flex items-center border rounded-xl px-3 mt-1 focus-within:ring-2 focus-within:ring-blue-500">
                    <i class='bx bx-id-card text-gray-400 text-lg'></i>
                    <select name="role"
                        class="w-full px-2 py-2 outline-none bg-transparent"
                        required>

                        <option value="admin" <?= $data['role']=='admin'?'selected':''; ?>>
                            Admin
                        </option>

                        <option value="petugas" <?= $data['role']=='petugas'?'selected':''; ?>>
                            Petugas
                        </option>

                        <option value="kader" <?= $data['role']=='kader'?'selected':''; ?>>
                            Kader
                        </option>

                    </select>
                </div>
            </div>

            <!-- BUTTON -->
            <div class="flex justify-between items-center pt-4">

                <a href="dashboard_admin.php?page=user"
                   class="flex items-center gap-1 text-gray-500 hover:text-gray-700 text-sm">
                   <i class='bx bx-arrow-back'></i>
                   Kembali
                </a>

                <button type="submit"
                    class="flex items-center gap-2 bg-gradient-to-r from-yellow-500 to-yellow-600 text-white px-5 py-2 rounded-xl shadow hover:scale-105 transition">
                    <i class='bx bx-save'></i>
                    Update
                </button>

            </div>

        </form>

    </div>

</div>

</main>