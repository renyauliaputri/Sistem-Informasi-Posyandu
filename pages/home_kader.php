<?php
// Hitung data
$total_balita = mysqli_fetch_assoc(mysqli_query($connect,"SELECT COUNT(*) as total FROM balita"))['total'];
$total_ibu = mysqli_fetch_assoc(mysqli_query($connect,"SELECT COUNT(*) as total FROM ibu_hamil"))['total'];
$total_imunisasi = mysqli_fetch_assoc(mysqli_query($connect,"SELECT COUNT(*) as total FROM riwayat_imunisasi"))['total'];
$total_kegiatan = mysqli_fetch_assoc(mysqli_query($connect,"SELECT COUNT(*) as total FROM kegiatan_posyandu"))['total'];
?>

<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<main class="p-6 bg-gray-100 min-h-screen">

<!-- TITLE -->
<h1 class="text-2xl font-semibold text-gray-700 flex items-center gap-2 mb-6">
    <i class='bx bx-leaf text-green-600 text-3xl'></i>
    Dashboard Kader
</h1>

<!-- ===================== -->
<!-- STATISTIK -->
<!-- ===================== -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

    <!-- BALITA -->
    <div class="bg-gradient-to-r from-green-500 to-green-600 text-white p-5 rounded-2xl shadow-lg hover:scale-105 transition">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-sm opacity-90">Total Balita</p>
                <h2 class="text-3xl font-bold"><?= $total_balita ?></h2>
            </div>
            <i class='bx bx-child text-4xl opacity-80'></i>
        </div>
    </div>

    <!-- IBU HAMIL -->
    <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 text-white p-5 rounded-2xl shadow-lg hover:scale-105 transition">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-sm opacity-90">Ibu Hamil</p>
                <h2 class="text-3xl font-bold"><?= $total_ibu ?></h2>
            </div>
            <i class='bx bx-female text-4xl opacity-80'></i>
        </div>
    </div>

    <!-- IMUNISASI -->
    <div class="bg-gradient-to-r from-green-600 to-green-700 text-white p-5 rounded-2xl shadow-lg hover:scale-105 transition">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-sm opacity-90">Imunisasi</p>
                <h2 class="text-3xl font-bold"><?= $total_imunisasi ?></h2>
            </div>
            <i class='bx bx-injection text-4xl opacity-80'></i>
        </div>
    </div>

    <!-- KEGIATAN -->
    <div class="bg-gradient-to-r from-lime-500 to-green-600 text-white p-5 rounded-2xl shadow-lg hover:scale-105 transition">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-sm opacity-90">Kegiatan</p>
                <h2 class="text-3xl font-bold"><?= $total_kegiatan ?></h2>
            </div>
            <i class='bx bx-calendar-event text-4xl opacity-80'></i>
        </div>
    </div>

</div>

<!-- ===================== -->
<!-- KEGIATAN TERBARU -->
<!-- ===================== -->
<div class="bg-white p-6 rounded-2xl shadow-lg">

    <div class="flex items-center justify-between mb-5">
        <h2 class="text-lg font-semibold text-gray-700 flex items-center gap-2">
            <i class='bx bx-time-five text-green-600 text-xl'></i>
            Kegiatan Terbaru
        </h2>
    </div>

<?php
$kegiatan = mysqli_query($connect,"
    SELECT * FROM kegiatan_posyandu
    ORDER BY tanggal_kegiatan DESC
    LIMIT 5
");
?>

<?php if(mysqli_num_rows($kegiatan) > 0): ?>

    <div class="space-y-4">
    <?php while($k=mysqli_fetch_assoc($kegiatan)): ?>

        <div class="flex items-start gap-4 p-4 rounded-xl border hover:bg-gray-50 transition">

            <!-- ICON -->
            <div class="bg-green-100 text-green-600 p-3 rounded-xl">
                <i class='bx bx-calendar text-xl'></i>
            </div>

            <!-- CONTENT -->
            <div class="flex-1">
                <div class="text-sm text-gray-500 flex items-center gap-2">
                    <i class='bx bx-time'></i>
                    <?= date('d M Y', strtotime($k['tanggal_kegiatan'])) ?>
                </div>

                <div class="font-semibold text-gray-800">
                    <?= $k['lokasi']; ?>
                </div>

                <div class="text-sm text-gray-600">
                    <?= $k['keterangan']; ?>
                </div>
            </div>

        </div>

    <?php endwhile; ?>
    </div>

<?php else: ?>

    <!-- EMPTY STATE -->
    <div class="text-center text-gray-400 py-10">
        <i class='bx bx-folder-open text-4xl mb-2'></i>
        <p>Belum ada kegiatan</p>
    </div>

<?php endif; ?>

</div>

</main>