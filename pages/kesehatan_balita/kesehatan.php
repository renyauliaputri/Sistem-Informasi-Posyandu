<?php
$role = $_SESSION['role'] ?? '';

$search = $_GET['search'] ?? '';

if($search){
    $data = mysqli_query($connect,"
        SELECT k.*, b.nama_balita
        FROM kesehatan_balita k
        JOIN balita b ON k.id_balita = b.id
        WHERE b.nama_balita LIKE '%$search%'
        OR k.tanggal LIKE '%$search%'
        ORDER BY k.id DESC
    ");
}else{
    $data = mysqli_query($connect,"
        SELECT k.*, b.nama_balita
        FROM kesehatan_balita k
        JOIN balita b ON k.id_balita = b.id
        ORDER BY k.id DESC
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
            <i class='bx bx-heart text-3xl text-[#38b000]'></i>
            Data Kesehatan Balita
        </h1>

        <div class="flex flex-col sm:flex-row gap-2">

            <!-- SEARCH -->
            <form method="GET" class="flex items-center gap-2 bg-gray-100 px-3 py-2 rounded-xl shadow-sm">
                <input type="hidden" name="page" value="kesehatan_balita">

                <i class='bx bx-search text-gray-500 text-lg'></i>

                <input type="text" 
                       name="search"
                       placeholder="Cari nama / tanggal..."
                       value="<?= htmlspecialchars($search); ?>"
                       class="bg-transparent outline-none text-sm w-40 sm:w-52">

                <button class="bg-[#38b000] text-white px-3 py-1 rounded-lg text-sm hover:bg-[#2d8600] transition">
                    Cari
                </button>
            </form>

            <!-- TAMBAH -->
            <?php if($role != 'admin'): ?>
            <a href="dashboard_kader.php?page=kesehatan_balita_tambah"
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

        <!-- HEAD -->
        <thead>
        <tr class="bg-gray-100 text-gray-600 text-sm">
            <th class="p-3 text-left">No</th>
            <th class="p-3 text-left">Nama Balita</th>
            <th class="p-3 text-center">Tanggal</th>
            <th class="p-3 text-center">Status</th>
            <?php if($role != 'admin'): ?>
            <th class="p-3 text-center">Aksi</th>
            <?php endif; ?>
        </tr>
        </thead>

        <!-- BODY -->
        <tbody>
<?php if(mysqli_num_rows($data) > 0): ?>
<?php $no=1; while($row=mysqli_fetch_assoc($data)): ?>
<tr class="border-b hover:bg-gray-50 transition align-middle">

    <!-- NO -->
    <td class="p-3"><?= $no++; ?></td>

    <!-- NAMA -->
    <td class="p-3 text-gray-700">
        <div class="flex items-center gap-2">
            <i class='bx bx-child text-[#38b000]'></i>
            <span class="font-medium"><?= $row['nama_balita'] ?></span>
        </div>
    </td>

    <!-- TANGGAL -->
    <td class="p-3 text-center text-gray-600">
        <?= date('d-m-Y', strtotime($row['tanggal'])); ?>
    </td>

    <!-- STATUS -->
    <td class="p-3 text-center">
        <span class="px-3 py-1 rounded-full text-xs font-semibold
        <?= $row['status_kesehatan']=='sehat' 
            ? 'bg-[#ccff33] text-[#006400]' 
            : 'bg-red-100 text-red-600'; ?>">
            <?= ucfirst($row['status_kesehatan']); ?>
        </span>
    </td>

    <?php if($role != 'admin'): ?>
    <!-- AKSI -->
    <td class="p-3">
        <div class="flex justify-center gap-2">

            <a href="dashboard_kader.php?page=kesehatan_balita_edit&id=<?= $row['id'] ?>"
               class="flex items-center gap-1 bg-[#38b000] text-white px-3 py-1 rounded-lg hover:bg-[#2d8600] transition text-xs shadow">
                <i class='bx bx-edit'></i>
                Edit
            </a>

            <a href="dashboard_kader.php?page=kesehatan_balita_hapus&id=<?= $row['id'] ?>"
               onclick="return confirm('Hapus data?')"
               class="flex items-center gap-1 bg-[#006400] text-white px-3 py-1 rounded-lg hover:bg-[#004d00] transition text-xs shadow">
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
    <td colspan="5" class="p-6 text-center text-gray-400">
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