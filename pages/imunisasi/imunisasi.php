<?php
$search = $_GET['search'] ?? '';

if($search){
    $data = mysqli_query($connect,
        "SELECT * FROM imunisasi 
        WHERE nama_imunisasi LIKE '%$search%' 
        OR keterangan LIKE '%$search%'"
    );
}else{
    $data = mysqli_query($connect,"SELECT * FROM imunisasi");
}
?>

<!-- BOXICONS -->
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<main class="p-6 bg-gray-100">

<div class="bg-white p-6 rounded-2xl shadow-lg">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">
        
        <h1 class="text-2xl font-semibold text-gray-700 flex items-center gap-2">
            <i class='bx bx-injection text-3xl text-green-600'></i>
            Data Imunisasi
        </h1>

        <div class="flex flex-col sm:flex-row gap-2">

            <!-- SEARCH -->
            <form method="GET" class="flex items-center gap-2 bg-gray-100 px-3 py-2 rounded-xl shadow-sm">
                <input type="hidden" name="page" value="kelola_imunisasi">

                <i class='bx bx-search text-gray-500 text-lg'></i>

                <input type="text" 
                       name="search"
                       value="<?= $search ?>"
                       placeholder="Cari imunisasi..."
                       class="bg-transparent outline-none text-sm w-40 sm:w-52">

                <button class="bg-green-600 text-white px-3 py-1 rounded-lg text-sm hover:bg-green-700 transition">
                    Cari
                </button>
            </form>

            <!-- TAMBAH -->
            <a href="dashboard_admin.php?page=kelola_imunisasi_tambah"
               class="flex items-center gap-2 bg-gradient-to-r from-green-600 to-green-700 text-white px-4 py-2 rounded-xl shadow hover:scale-105 transition text-sm">
               <i class='bx bx-plus'></i>
               Tambah
            </a>

        </div>
    </div>

    <!-- TABLE -->
    <div class="overflow-x-auto rounded-xl border">
    <table class="w-full text-sm table-auto">

        <!-- HEAD -->
        <thead>
        <tr class="bg-gray-100 text-gray-600">
            <th class="p-3 text-left">No</th>
            <th class="p-3 text-left">Imunisasi</th>
            <th class="p-3 text-left">Keterangan</th>
            <th class="p-3 text-center">Aksi</th>
        </tr>
        </thead>

        <!-- BODY -->
        <tbody>
        <?php $no=1; while($row=mysqli_fetch_assoc($data)): ?>
        <tr class="border-b hover:bg-gray-50 transition align-middle">

            <!-- NO -->
            <td class="p-3"><?= $no++; ?></td>

            <!-- NAMA IMUNISASI -->
            <td class="p-3">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-green-100 text-green-600 flex items-center justify-center rounded-full text-xs font-bold">
                        <?= strtoupper(substr($row['nama_imunisasi'],0,1)); ?>
                    </div>
                    <span class="font-medium text-gray-800">
                        <?= $row['nama_imunisasi']; ?>
                    </span>
                </div>
            </td>

            <!-- KETERANGAN -->
            <td class="p-3 text-gray-600 max-w-[250px] truncate">
                <div class="flex items-center gap-2">
                    <i class='bx bx-info-circle text-gray-400'></i>
                    <span title="<?= $row['keterangan']; ?>">
                        <?= $row['keterangan']; ?>
                    </span>
                </div>
            </td>

            <!-- AKSI -->
            <td class="p-3">
                <div class="flex justify-center gap-2">

                    <a href="dashboard_admin.php?page=kelola_imunisasi_edit&id=<?= $row['id'] ?>"
                       class="flex items-center gap-1 bg-[#38b000] text-white px-3 py-1 rounded-lg hover:bg-[#2d8600] transition text-xs shadow">
                        <i class='bx bx-edit'></i>
                        Edit
                    </a>

                    <a href="dashboard_admin.php?page=kelola_imunisasi_hapus&id=<?= $row['id'] ?>"
                       onclick="return confirm('Hapus data?')"
                       class="flex items-center gap-1 bg-[#006400] ed-500 text-white px-3 py-1 rounded-lg hover:bg-[#004d00] transition text-xs shadow">
                        <i class='bx bx-trash'></i>
                        Hapus
                    </a>

                </div>
            </td>

        </tr>
        <?php endwhile; ?>
        </tbody>

    </table>
    </div>

</div>

</main>