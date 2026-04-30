<?php
$balita = mysqli_query($connect, "SELECT * FROM balita ORDER BY nama_balita ASC");
$imunisasi = mysqli_query($connect, "SELECT * FROM imunisasi ORDER BY nama_imunisasi ASC");

if(isset($_POST['simpan'])){

    $id_balita = $_POST['id_balita'];
    $id_imunisasi = $_POST['id_imunisasi'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    mysqli_query($connect, "
        INSERT INTO riwayat_imunisasi
        (id_balita, id_imunisasi, tanggal_imunisasi, status)
        VALUES ('$id_balita','$id_imunisasi','$tanggal','$status')
    ");

    echo "<script>
        alert('Data imunisasi berhasil disimpan');
        window.location='dashboard_kader.php?page=kelola_imunisasi';
    </script>";
}
?>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<main class=" p-6 bg-gray-100 min-h-screen">

<div class="max-w-3xl mx-auto">

<div class="bg-white p-6 rounded-2xl shadow-lg">

    <!-- HEADER -->
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-gray-700 flex items-center gap-2">
            <i class='bx bx-plus-medical text-green-600 text-2xl'></i>
            Tambah Imunisasi
        </h1>
        <p class="text-sm text-gray-500">Isi data imunisasi balita</p>
    </div>

    <!-- FORM -->
    <form method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-5">

        <!-- BALITA -->
        <div>
            <label class="text-sm text-gray-600 flex items-center gap-1">
                <i class='bx bx-child text-green-500'></i>
                Nama Balita
            </label>
            <select name="id_balita" required
                class="w-full border px-4 py-2 mt-1 rounded-xl focus:ring-2 focus:ring-green-500 focus:outline-none">
                <option value="">Pilih Balita</option>
                <?php while($b=mysqli_fetch_assoc($balita)): ?>
                <option value="<?= $b['id']; ?>">
                    <?= $b['nama_balita']; ?>
                </option>
                <?php endwhile; ?>
            </select>
        </div>

        <!-- IMUNISASI -->
        <div>
            <label class="text-sm text-gray-600 flex items-center gap-1">
                <i class='bx bx-injection text-green-500'></i>
                Jenis Imunisasi
            </label>
            <select name="id_imunisasi" required
                class="w-full border px-4 py-2 mt-1 rounded-xl focus:ring-2 focus:ring-green-500 focus:outline-none">
                <option value="">Pilih Imunisasi</option>
                <?php while($i=mysqli_fetch_assoc($imunisasi)): ?>
                <option value="<?= $i['id']; ?>">
                    <?= $i['nama_imunisasi']; ?>
                </option>
                <?php endwhile; ?>
            </select>
        </div>

        <!-- TANGGAL -->
        <div>
            <label class="text-sm text-gray-600 flex items-center gap-1">
                <i class='bx bx-calendar text-green-500'></i>
                Tanggal
            </label>
            <input type="date" name="tanggal" required
                class="w-full border px-4 py-2 mt-1 rounded-xl focus:ring-2 focus:ring-green-500 focus:outline-none">
        </div>

        <!-- STATUS -->
        <div>
            <label class="text-sm text-gray-600 flex items-center gap-1">
                <i class='bx bx-check-shield text-green-500'></i>
                Status
            </label>
            <select name="status" required
                class="w-full border px-4 py-2 mt-1 rounded-xl focus:ring-2 focus:ring-green-500 focus:outline-none">
                <option value="Sudah">Sudah</option>
                <option value="Belum">Belum</option>
            </select>
        </div>

        <!-- BUTTON -->
        <div class="md:col-span-2 flex justify-between items-center pt-4">

            <a href="dashboard_kader.php?page=imunisasi"
               class="text-gray-500 hover:text-gray-700 flex items-center gap-1 text-sm">
               <i class='bx bx-arrow-back'></i> Kembali
            </a>

            <button type="submit" name="simpan"
                class="flex items-center gap-2 bg-gradient-to-r from-green-500 to-green-600 text-white px-6 py-2 rounded-xl shadow hover:scale-105 transition">
                <i class='bx bx-save'></i>
                Simpan
            </button>

        </div>

    </form>

</div>

</div>

</main>