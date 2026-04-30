<?php

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM ibu_hamil WHERE id='$id'"));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    mysqli_query($connect, "
        UPDATE ibu_hamil SET
        nama_ibu='$_POST[nama_ibu]',
        tanggal_lahir='$_POST[tanggal_lahir]',
        alamat='$_POST[alamat]',
        usia_kehamilan='$_POST[usia_kehamilan]'
        WHERE id='$id'
    ");
    header("Location: dashboard_admin.php?page=kelola_ibu_hamil");
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
                <i class='bx bx-edit text-2xl text-[#38b000]'></i>
                Edit Ibu Hamil
            </h1>
            <p class="text-sm text-gray-500">Perbarui data ibu hamil</p>
        </div>

        <!-- FORM -->
        <form method="POST" class="space-y-5">

            <!-- NAMA -->
            <div>
                <label class="text-sm text-gray-600">Nama</label>
                <div class="flex items-center border rounded-xl px-3 mt-1 focus-within:ring-2 focus-within:ring-[#38b000]">
                    <i class='bx bx-user text-gray-400 text-lg'></i>
                    <input name="nama_ibu"
                        value="<?= $data['nama_ibu']; ?>"
                        class="w-full px-2 py-2 outline-none"
                        required>
                </div>
            </div>

            <!-- TANGGAL LAHIR -->
            <div>
                <label class="text-sm text-gray-600">Tanggal Lahir</label>
                <div class="flex items-center border rounded-xl px-3 mt-1 focus-within:ring-2 focus-within:ring-[#38b000]">
                    <i class='bx bx-calendar text-gray-400 text-lg'></i>
                    <input name="tanggal_lahir" type="date"
                        value="<?= $data['tanggal_lahir']; ?>"
                        class="w-full px-2 py-2 outline-none"
                        required>
                </div>
            </div>

            <!-- ALAMAT -->
            <div>
                <label class="text-sm text-gray-600">Alamat</label>
                <div class="flex items-center border rounded-xl px-3 mt-1 focus-within:ring-2 focus-within:ring-[#38b000]">
                    <i class='bx bx-map text-gray-400 text-lg'></i>
                    <input name="alamat"
                        value="<?= $data['alamat']; ?>"
                        class="w-full px-2 py-2 outline-none"
                        required>
                </div>
            </div>

            <!-- USIA KEHAMILAN -->
            <div>
                <label class="text-sm text-gray-600">Usia Kehamilan (bulan)</label>
                <div class="flex items-center border rounded-xl px-3 mt-1 focus-within:ring-2 focus-within:ring-[#38b000]">
                    <i class='bx bx-time text-gray-400 text-lg'></i>
                    <input name="usia_kehamilan" type="number"
                        value="<?= $data['usia_kehamilan']; ?>"
                        class="w-full px-2 py-2 outline-none"
                        required>
                </div>
            </div>

            <!-- BUTTON -->
            <div class="flex justify-between items-center pt-4">

                <a href="dashboard_admin.php?page=kelola_ibu_hamil"
                   class="flex items-center gap-1 text-gray-500 hover:text-[#006400] text-sm">
                   <i class='bx bx-arrow-back'></i>
                   Kembali
                </a>

                <button type="submit"
                    class="flex items-center gap-2 bg-gradient-to-r from-[#38b000] to-[#006400] text-white px-5 py-2 rounded-xl shadow hover:scale-105 transition">
                    <i class='bx bx-save'></i>
                    Update
                </button>

            </div>

        </form>

    </div>

</div>

</main>