<?php

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $nama_balita = mysqli_real_escape_string($connect, $_POST['nama_balita']);
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nama_ayah = mysqli_real_escape_string($connect, $_POST['nama_ayah']);
    $nama_ibu = mysqli_real_escape_string($connect, $_POST['nama_ibu']);
    $alamat = mysqli_real_escape_string($connect, $_POST['alamat']);

    mysqli_query($connect, "INSERT INTO balita
        (nama_balita,tanggal_lahir,jenis_kelamin,nama_ayah,nama_ibu,alamat)
        VALUES ('$nama_balita','$tanggal_lahir','$jenis_kelamin','$nama_ayah','$nama_ibu','$alamat')");
    header("Location: dashboard_admin.php?page=kelola_balita");
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
                <i class='bx bx-child text-2xl text-green-600'></i>
                Tambah Balita
            </h1>
            <p class="text-sm text-gray-500">Isi data balita dengan lengkap</p>
        </div>

        <!-- FORM -->
        <form method="POST" class="space-y-5">

            <!-- NAMA BALITA -->
            <div>
                <label class="text-sm text-gray-600">Nama Balita</label>
                <div class="flex items-center border rounded-xl px-3 mt-1 focus-within:ring-2 focus-within:ring-green-500">
                    <i class='bx bx-child text-gray-400 text-lg'></i>
                    <input type="text" name="nama_balita"
                        class="w-full px-2 py-2 outline-none"
                        placeholder="Nama balita"
                        required>
                </div>
            </div>

            <!-- TANGGAL LAHIR -->
            <div>
                <label class="text-sm text-gray-600">Tanggal Lahir</label>
                <div class="flex items-center border rounded-xl px-3 mt-1 focus-within:ring-2 focus-within:ring-green-500">
                    <i class='bx bx-calendar text-gray-400 text-lg'></i>
                    <input type="date" name="tanggal_lahir"
                        class="w-full px-2 py-2 outline-none"
                        required>
                </div>
            </div>

            <!-- JENIS KELAMIN -->
            <div>
                <label class="text-sm text-gray-600">Jenis Kelamin</label>
                <div class="flex items-center border rounded-xl px-3 mt-1 focus-within:ring-2 focus-within:ring-green-500">
                    <i class='bx bx-user text-gray-400 text-lg'></i>
                    <select name="jenis_kelamin"
                        class="w-full px-2 py-2 outline-none bg-transparent"
                        required>
                        <option value="">-- Pilih --</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
            </div>

            <!-- NAMA AYAH -->
            <div>
                <label class="text-sm text-gray-600">Nama Ayah</label>
                <div class="flex items-center border rounded-xl px-3 mt-1 focus-within:ring-2 focus-within:ring-green-500">
                    <i class='bx bx-male text-gray-400 text-lg'></i>
                    <input type="text" name="nama_ayah"
                        class="w-full px-2 py-2 outline-none"
                        placeholder="Nama ayah"
                        required>
                </div>
            </div>

            <!-- NAMA IBU -->
            <div>
                <label class="text-sm text-gray-600">Nama Ibu</label>
                <div class="flex items-center border rounded-xl px-3 mt-1 focus-within:ring-2 focus-within:ring-green-500">
                    <i class='bx bx-female text-gray-400 text-lg'></i>
                    <input type="text" name="nama_ibu"
                        class="w-full px-2 py-2 outline-none"
                        placeholder="Nama ibu"
                        required>
                </div>
            </div>

            <!-- ALAMAT -->
            <div>
                <label class="text-sm text-gray-600">Alamat</label>
                <div class="flex items-center border rounded-xl px-3 mt-1 focus-within:ring-2 focus-within:ring-green-500">
                    <i class='bx bx-map text-gray-400 text-lg'></i>
                    <input type="text" name="alamat"
                        class="w-full px-2 py-2 outline-none"
                        placeholder="Alamat lengkap"
                        required>
                </div>
            </div>

            <!-- BUTTON -->
            <div class="flex justify-between items-center pt-4">

                <a href="dashboard_admin.php?page=kelola_balita"
                   class="flex items-center gap-1 text-gray-500 hover:text-gray-700 text-sm">
                   <i class='bx bx-arrow-back'></i>
                   Kembali
                </a>

                <button type="submit"
                    class="flex items-center gap-2 bg-gradient-to-r from-green-600 to-green-700 text-white px-5 py-2 rounded-xl shadow hover:scale-105 transition">
                    <i class='bx bx-save'></i>
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>

</main>