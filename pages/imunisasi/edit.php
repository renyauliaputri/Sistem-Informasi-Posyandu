<?php
$data = mysqli_fetch_assoc(mysqli_query($connect,
"SELECT * FROM imunisasi WHERE id='$_GET[id]'"));

if($_SERVER['REQUEST_METHOD']=="POST"){

mysqli_query($connect,"UPDATE imunisasi SET
nama_imunisasi='$_POST[nama_imunisasi]',
keterangan='$_POST[keterangan]'
WHERE id='$_GET[id]'");

header("Location: dashboard_admin.php?page=kelola_imunisasi");
exit;
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
                <i class='bx bx-edit text-2xl text-green-600'></i>
                Edit Imunisasi
            </h1>
            <p class="text-sm text-gray-500">Perbarui data imunisasi</p>
        </div>

        <!-- FORM -->
        <form method="POST" class="space-y-5">

            <!-- NAMA IMUNISASI -->
            <div>
                <label class="text-sm text-gray-600">Nama Imunisasi</label>
                <div class="flex items-center border rounded-xl px-3 mt-1 focus-within:ring-2 focus-within:ring-green-500">
                    <i class='bx bx-injection text-gray-400 text-lg'></i>
                    <input type="text" name="nama_imunisasi"
                        value="<?= htmlspecialchars($data['nama_imunisasi']); ?>"
                        class="w-full px-2 py-2 outline-none"
                        required>
                </div>
            </div>

            <!-- KETERANGAN -->
            <div>
                <label class="text-sm text-gray-600">Keterangan</label>
                <div class="flex items-center border rounded-xl px-3 mt-1 focus-within:ring-2 focus-within:ring-green-500">
                    <i class='bx bx-notepad text-gray-400 text-lg'></i>
                    <input type="text" name="keterangan"
                        value="<?= htmlspecialchars($data['keterangan']); ?>"
                        class="w-full px-2 py-2 outline-none">
                </div>
            </div>

            <!-- BUTTON -->
            <div class="flex justify-between items-center pt-4">

                <a href="dashboard_admin.php?page=kelola_imunisasi"
                   class="flex items-center gap-1 text-gray-500 hover:text-gray-700 text-sm">
                   <i class='bx bx-arrow-back'></i>
                   Kembali
                </a>

                <button type="submit"
                    class="flex items-center gap-2 bg-gradient-to-r from-green-600 to-green-700 text-white px-5 py-2 rounded-xl shadow hover:scale-105 transition">
                    <i class='bx bx-save'></i>
                    Update
                </button>

            </div>

        </form>

    </div>

</div>

</main>