<?php
// Ambil balita untuk dropdown
$balita = mysqli_query($connect, "SELECT * FROM balita ORDER BY nama_balita ASC");

// Proses simpan
if(isset($_POST['simpan'])){

    $id_balita = $_POST['id_balita'];
    $tanggal = $_POST['tanggal'];
    $berat = $_POST['berat_badan'];
    $tinggi = $_POST['tinggi_badan'];

    mysqli_query($connect, "
        INSERT INTO penimbangan 
        (id_balita, tanggal_penimbangan, berat_badan, tinggi_badan)
        VALUES ('$id_balita','$tanggal','$berat','$tinggi')
    ");

    echo "<script>
        alert('Data berhasil disimpan');
        window.location='dashboard_kader.php?page=penimbangan';
    </script>";
}
?>

    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <main class="p-6 bg-gray-100">

    <div class="max-w-xl mx-auto">

    <div class="bg-white p-6 rounded-2xl shadow-lg border">

    <!-- HEADER -->
    <div class="mb-6">
        <h1 class="text-xl font-semibold text-gray-700 flex items-center gap-2">
            <i class='bx bx-plus-circle text-2xl text-green-600'></i>
            Tambah Penimbangan
        </h1>
        <p class="text-sm text-gray-500">Input data penimbangan balita</p>
    </div>

    <!-- FORM -->
    <form method="POST" class="space-y-4">

    <!-- BALITA -->
    <div>
        <label class="text-sm text-gray-600 flex items-center gap-1">
            <i class='bx bx-child text-green-500'></i>
            Nama Balita
        </label>
        <select name="id_balita" required
            class="w-full border px-4 py-2 rounded-xl mt-1 focus:ring-2 focus:ring-green-500 focus:outline-none">
            <option value="">Pilih Balita</option>
            <?php while($b=mysqli_fetch_assoc($balita)): ?>
            <option value="<?= $b['id']; ?>">
                <?= $b['nama_balita']; ?>
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
            class="w-full border px-4 py-2 rounded-xl mt-1 focus:ring-2 focus:ring-green-500 focus:outline-none">
    </div>

    <!-- BERAT -->
    <div>
        <label class="text-sm text-gray-600 flex items-center gap-1">
            <i class='bx bx-line-chart text-blue-500'></i>
            Berat Badan (kg)
        </label>
        <input type="number" step="0.1" name="berat_badan" required
            class="w-full border px-4 py-2 rounded-xl mt-1 focus:ring-2 focus:ring-blue-500 focus:outline-none">
    </div>

    <!-- TINGGI -->
    <div>
        <label class="text-sm text-gray-600 flex items-center gap-1">
            <i class='bx bx-ruler text-purple-500'></i>
            Tinggi Badan (cm)
        </label>
        <input type="number" step="0.1" name="tinggi_badan" required
            class="w-full border px-4 py-2 rounded-xl mt-1 focus:ring-2 focus:ring-purple-500 focus:outline-none">
    </div>

    <!-- BUTTON -->
    <div class="flex justify-between items-center pt-4">

        <a href="dashboard_kader.php?page=penimbangan"
        class="text-gray-500 hover:text-gray-700 text-sm">
        ← Kembali
        </a>

        <button type="submit" name="simpan"
            class="flex items-center gap-2 bg-gradient-to-r from-green-600 to-green-700 text-white px-5 py-2 rounded-xl shadow hover:scale-105 transition">
            <i class='bx bx-save'></i>
            Simpan
        </button>

    </div>

    </form>

    </div>
    </div>

    </main>