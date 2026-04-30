<?php
$role = $_SESSION['role'] ?? '';

$search = $_GET['search'] ?? '';

if($search){
    $data = mysqli_query($connect, "
        SELECT p.*, b.nama_balita 
        FROM penimbangan p
        JOIN balita b ON p.id_balita = b.id
        WHERE b.nama_balita LIKE '%$search%'
        OR p.tanggal_penimbangan LIKE '%$search%'
        ORDER BY p.id DESC
    ");
}else{
    $data = mysqli_query($connect, "
        SELECT p.*, b.nama_balita 
        FROM penimbangan p
        JOIN balita b ON p.id_balita = b.id
        ORDER BY p.id DESC
    ");
}
?>

<!-- BOXICONS -->
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<main class="p-6 bg-gray-100">

<div class="bg-white p-6 rounded-2xl shadow-lg">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">
        
        <h1 class="text-2xl font-semibold text-gray-700 flex items-center gap-2">
            <i class='bx bx-line-chart text-3xl text-green-600'></i>
            Data Penimbangan
        </h1>

        <div class="flex flex-col sm:flex-row gap-2">

            <!-- SEARCH -->
            <form method="GET" class="flex gap-2">
                <input type="hidden" name="page" value="penimbangan">

                <div class="relative">
                    <i class='bx bx-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400'></i>
                    <input type="text" 
                        name="search"
                        value="<?= htmlspecialchars($search); ?>"
                        placeholder="Cari nama / tanggal..."
                        class="border pl-10 pr-4 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 text-sm shadow-sm">
                </div>

                <button class="bg-gray-600 text-white px-4 py-2 rounded-xl hover:bg-gray-700 transition text-sm">
                    Cari
                </button>
            </form>

            <!-- TAMBAH -->
            <?php if($role != 'admin'): ?>
            <a href="dashboard_kader.php?page=penimbangan_tambah"
               class="flex items-center gap-2 bg-gradient-to-r from-green-600 to-green-700 text-white px-4 py-2 rounded-xl shadow hover:scale-105 transition text-sm">
                <i class='bx bx-plus'></i>
                Tambah
            </a>
            <?php endif; ?>

        </div>
    </div>

    <!-- TABLE -->
    <div class="overflow-x-auto">
    <table class="w-full text-sm">

        <!-- HEAD -->
        <thead>
        <tr class="bg-gray-100 text-gray-600 text-sm">
            <th class="p-3 text-left">No</th>
            <th class="p-3 text-left">Nama Balita</th>
            <th class="p-3 text-center">Tanggal</th>
            <th class="p-3 text-center">Berat</th>
            <th class="p-3 text-center">Tinggi</th>
            <?php if($role != 'admin'): ?>
            <th class="p-3 text-center">Aksi</th>
            <?php endif; ?>
        </tr>
        </thead>

        <!-- BODY -->
        <tbody>
        <?php if(mysqli_num_rows($data) > 0): ?>
        <?php $no=1; while($row=mysqli_fetch_assoc($data)): ?>
        <tr class="border-b hover:bg-gray-50 transition">

            <td class="p-3"><?= $no++; ?></td>

            <td class="p-3 font-medium text-gray-800 flex items-center gap-2">
                <i class='bx bx-child text-green-500'></i>
                <?= $row['nama_balita']; ?>
            </td>

            <td class="p-3 text-center text-gray-600">
                <?= date('d-m-Y', strtotime($row['tanggal_penimbangan'])); ?>
            </td>

            <td class="p-3 text-center">
                <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-600 text-xs font-semibold">
                    <?= $row['berat_badan']; ?> kg
                </span>
            </td>

            <td class="p-3 text-center">
                <span class="px-3 py-1 rounded-full bg-green-100 text-green-600 text-xs font-semibold">
                    <?= $row['tinggi_badan']; ?> cm
                </span>
            </td>

            <?php if($role != 'admin'): ?>
            <!-- AKSI -->
            <td class="p-3">
                <div class="flex justify-center gap-2">

                    <a href="dashboard_kader.php?page=penimbangan_edit&id=<?= $row['id']; ?>"
                       class="flex items-center gap-1 bg-yellow-400 text-white px-3 py-1 rounded-lg hover:bg-yellow-500 transition text-xs shadow">
                        <i class='bx bx-edit'></i>
                        Edit
                    </a>

                    <a href="dashboard_kader.php?page=penimbangan_hapus&id=<?= $row['id']; ?>"
                       onclick="return confirm('Hapus data?')"
                       class="flex items-center gap-1 bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 transition text-xs shadow">
                        <i class='bx bx-trash'></i>
                        Hapus
                    </a>

                </div>
            </td>
            <?php endif; ?>

        </tr>
        <?php endwhile; ?>
        <?php else: ?>
        <tr>
            <td colspan="6" class="p-6 text-center text-gray-400">
                <i class='bx bx-info-circle text-2xl mb-1'></i><br>
                Data tidak ditemukan
            </td>
        </tr>
        <?php endif; ?>
        </tbody>

    </table>
    </div>

</div>

</main>