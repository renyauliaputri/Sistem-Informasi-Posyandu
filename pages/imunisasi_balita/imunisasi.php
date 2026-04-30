<?php
$role = $_SESSION['role'] ?? '';

$search = $_GET['search'] ?? '';

if($search){
    $data = mysqli_query($connect, "
        SELECT r.*, b.nama_balita, i.nama_imunisasi
        FROM riwayat_imunisasi r
        JOIN balita b ON r.id_balita = b.id
        JOIN imunisasi i ON r.id_imunisasi = i.id
        WHERE b.nama_balita LIKE '%$search%'
        OR i.nama_imunisasi LIKE '%$search%'
        ORDER BY r.id DESC
    ");
}else{
    $data = mysqli_query($connect, "
        SELECT r.*, b.nama_balita, i.nama_imunisasi
        FROM riwayat_imunisasi r
        JOIN balita b ON r.id_balita = b.id
        JOIN imunisasi i ON r.id_imunisasi = i.id
        ORDER BY r.id DESC
    ");
}
?>

<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<main class="p-6 bg-gray-100">

<div class="bg-white p-6 rounded-2xl shadow-lg">

<!-- HEADER -->
<div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">

    <!-- TITLE -->
    <h1 class="text-2xl font-semibold text-gray-700 flex items-center gap-2">
        <i class='bx bx-injection text-[#38b000] text-3xl'></i>
        Data Imunisasi Balita
    </h1>

    <!-- RIGHT -->
    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2">

        <!-- SEARCH -->
        <form method="GET" class="flex items-center gap-2 bg-gray-100 px-3 py-2 rounded-xl shadow-sm">
            <input type="hidden" name="page" value="imunisasi">

            <i class='bx bx-search text-gray-500'></i>

            <input type="text" name="search"
                value="<?= htmlspecialchars($search); ?>"
                placeholder="Cari nama / imunisasi..."
                class="bg-transparent outline-none text-sm w-40 sm:w-52">

            <button class="bg-[#38b000] text-white px-3 py-1 rounded-lg text-sm hover:bg-[#2d8600] transition">
                Cari
            </button>
        </form>

        <!-- TAMBAH -->
        <?php if($role != 'admin'): ?>
        <a href="dashboard_kader.php?page=imunisasi_tambah"
        class="flex items-center gap-2 bg-gradient-to-r from-[#38b000] to-[#006400] text-white px-4 py-2 rounded-xl shadow hover:scale-105 transition text-sm">
            <i class='bx bx-plus'></i>
            Tambah
        </a>
        <?php endif; ?>

    </div>

</div>

<!-- TABLE -->
<div class="overflow-x-auto rounded-xl border">
<table class="w-full text-sm">

<thead>
<tr class="bg-gray-100 text-gray-600">
    <th class="p-3 text-center">No</th>
    <th class="p-3 text-left">Nama Balita</th>
    <th class="p-3 text-left">Jenis Imunisasi</th>
    <th class="p-3 text-center">Tanggal</th>
    <th class="p-3 text-center">Status</th>
</tr>
</thead>

<tbody>
<?php if(mysqli_num_rows($data) > 0): ?>
<?php $no=1; while($row=mysqli_fetch_assoc($data)): ?>
<tr class="border-b hover:bg-gray-50 transition">

    <!-- NO -->
    <td class="p-3 text-center"><?= $no++; ?></td>

    <!-- NAMA BALITA -->
    <td class="p-3 text-gray-800">
        <div class="flex items-center gap-2">
            <i class='bx bx-child text-[#38b000]'></i>
            <span class="font-medium"><?= $row['nama_balita']; ?></span>
        </div>
    </td>

    <!-- IMUNISASI -->
    <td class="p-3 text-gray-700">
        <div class="flex items-center gap-2">
            <i class='bx bx-plus-medical text-[#38b000]'></i>
            <span><?= $row['nama_imunisasi']; ?></span>
        </div>
    </td>

    <!-- TANGGAL -->
    <td class="p-3 text-center text-gray-600 whitespace-nowrap">
        <?= date('d M Y', strtotime($row['tanggal_imunisasi'])); ?>
    </td>

    <!-- STATUS -->
    <td class="p-3 text-center">
        <span class="px-3 py-1 rounded-full text-xs font-semibold
        <?= $row['status']=='selesai' 
            ? 'bg-[#ccff33] text-[#006400]' 
            : 'bg-yellow-100 text-yellow-600'; ?>">
            <?= ucfirst($row['status']); ?>
        </span>
    </td>

</tr>
<?php endwhile; ?>
<?php else: ?>
<tr>
    <td colspan="5" class="p-6 text-center text-gray-400">
        <i class='bx bx-folder-open text-3xl mb-2'></i><br>
        Belum ada data imunisasi
    </td>
</tr>
<?php endif; ?>
</tbody>
</table>
</div>

</div>

</main>