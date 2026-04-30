<?php
$search = $_GET['search'] ?? '';

if($search){
    $data = mysqli_query($connect,"
        SELECT * FROM kegiatan_posyandu
        WHERE lokasi LIKE '%$search%'
        OR keterangan LIKE '%$search%'
        ORDER BY id DESC
    ");
}else{
    $data = mysqli_query($connect,"SELECT * FROM kegiatan_posyandu ORDER BY id DESC");
}
?>

<!-- BOXICONS -->
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<main class="p-6 bg-gray-100">

<div class="bg-white p-6 rounded-2xl shadow-lg">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">
        
        <h1 class="text-2xl font-semibold text-gray-700 flex items-center gap-2">
            <i class='bx bx-calendar-event text-3xl text-green-500'></i>
            Laporan Kegiatan
        </h1>

        <div class="flex flex-col sm:flex-row gap-2">

            <!-- SEARCH -->
            <form method="GET" class="flex items-center gap-2 bg-gray-100 px-3 py-2 rounded-xl shadow-sm">
                <input type="hidden" name="page" value="laporan_kegiatan">

                <i class='bx bx-search text-gray-500'></i>

                <input type="text" 
                       name="search"
                       value="<?= $search ?>"
                       placeholder="Cari lokasi / keterangan..."
                       class="bg-transparent outline-none text-sm w-40 sm:w-52">

                <button class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded-lg text-sm transition">
                    Cari
                </button>
            </form>

            <!-- TAMBAH -->
            <a href="dashboard_kader.php?page=kegiatan_tambah"
               class="flex items-center gap-2 bg-gradient-to-r from-green-600 to-green-700 text-white px-4 py-2 rounded-xl shadow hover:scale-105 transition text-sm">
                <i class='bx bx-plus'></i>
                Tambah
            </a>

        </div>

    </div>

    <!-- TABLE -->
    <div class="overflow-x-auto rounded-xl border">
    <table class="w-full text-sm">

        <!-- HEAD -->
        <thead>
        <tr class="bg-green-100 text-green-700">
            <th class="p-3 text-left">No</th>
            <th class="p-3 text-left">Tanggal</th>
            <th class="p-3 text-left">Lokasi</th>
            <th class="p-3 text-left">Keterangan</th>
            <th class="p-3 text-center"></th>
        </tr>
        </thead>

        <!-- BODY -->
        <tbody>
        <?php $no=1; while($row=mysqli_fetch_assoc($data)): ?>
        <tr class="border-b hover:bg-gray-50 transition align-middle">

            <td class="p-3"><?= $no++; ?></td>

            <!-- TANGGAL -->
            <td class="p-3 text-gray-600">
                <div class="flex items-center gap-2">
                    <i class='bx bx-calendar text-gray-400'></i>
                    <?= date('d-m-Y', strtotime($row['tanggal_kegiatan'])); ?>
                </div>
            </td>

            <!-- LOKASI -->
            <td class="p-3 font-medium text-gray-800">
                <div class="flex items-center gap-2">
                    <i class='bx bx-map text-gray-400'></i>
                    <?= $row['lokasi']; ?>
                </div>
            </td>

            <!-- KETERANGAN -->
            <td class="p-3 text-gray-600 max-w-[250px] truncate">
                <div class="flex items-center gap-2">
                    <i class='bx bx-note text-gray-400'></i>
                    <span title="<?= $row['keterangan']; ?>">
                        <?= $row['keterangan']; ?>
                    </span>
                </div>
            </td>

            <!-- AKSI -->
            <td class="p-3"></td>

        </tr>
        <?php endwhile; ?>
        </tbody>

    </table>
    </div>

</div>

</main>