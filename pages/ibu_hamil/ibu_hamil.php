<?php
$search = $_GET['search'] ?? '';

if($search){
    $data = mysqli_query($connect,
        "SELECT * FROM ibu_hamil
        WHERE nama_ibu LIKE '%$search%'
        OR alamat LIKE '%$search%'"
    );
}else{
    $data = mysqli_query($connect,"SELECT * FROM ibu_hamil ORDER BY id DESC");
}
?>

<!-- BOXICONS -->
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<main class="p-6 bg-gray-100">

<div class="bg-white p-6 rounded-2xl shadow-lg">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">
        
        <h1 class="text-2xl font-semibold text-gray-700 flex items-center gap-2">
            <i class='bx bx-female text-3xl text-[#38b000]'></i>
            Data Ibu Hamil
        </h1>

        <div class="flex flex-col sm:flex-row gap-2">

            <!-- SEARCH -->
            <form method="GET" class="flex items-center gap-2 bg-gray-100 px-3 py-2 rounded-xl shadow-sm">
                <input type="hidden" name="page" value="kelola_ibu_hamil">

                <i class='bx bx-search text-gray-500 text-lg'></i>

                <input type="text" 
                       name="search"
                       value="<?= $search ?>"
                       placeholder="Cari nama / alamat..."
                       class="bg-transparent outline-none text-sm w-40 sm:w-52">

                <button class="bg-[#38b000] text-white px-3 py-1 rounded-lg text-sm hover:bg-[#2d8600] transition">
                    Cari
                </button>
            </form>

            <!-- TAMBAH -->
            <?php if($_SESSION['role'] == 'admin'): ?>
            <a href="dashboard_admin.php?page=kelola_ibu_hamil_tambah"
               class="flex items-center gap-2 bg-gradient-to-r from-[#38b000] to-[#006400] text-white px-4 py-2 rounded-xl shadow hover:scale-105 transition text-sm">
               <i class='bx bx-plus'></i>
               Tambah
            </a>
            <?php endif; ?>

        </div>
    </div>

    <!-- TABLE -->
    <div class="overflow-x-auto rounded-xl border">
    <table class="w-full text-sm table-auto">

        <!-- HEAD -->
        <thead>
        <tr class="bg-gray-100 text-gray-600">
            <th class="p-3 text-left">No</th>
            <th class="p-3 text-left">Nama</th>
            <th class="p-3 text-left">Alamat</th>
            <th class="p-3 text-center">Usia</th>

            <?php if($_SESSION['role'] == 'admin'): ?>
            <th class="p-3 text-center">Aksi</th>
            <?php endif; ?>
        </tr>
        </thead>

        <!-- BODY -->
        <tbody>
        <?php $no=1; while($r=mysqli_fetch_assoc($data)): ?>
        <tr class="border-b hover:bg-gray-50 transition align-middle">

            <!-- NO -->
            <td class="p-3"><?= $no++; ?></td>

            <!-- NAMA -->
            <td class="p-3">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-[#ccff33] text-[#006400] flex items-center justify-center rounded-full text-xs font-bold">
                        <?= strtoupper(substr($r['nama_ibu'],0,1)); ?>
                    </div>
                    <span class="font-medium text-gray-800">
                        <?= $r['nama_ibu']; ?>
                    </span>
                </div>
            </td>

            <!-- ALAMAT -->
            <td class="p-3 text-gray-600">
                <div class="flex items-center gap-2">
                    <i class='bx bx-map text-gray-400'></i>
                    <span><?= $r['alamat']; ?></span>
                </div>
            </td>

            <!-- USIA -->
            <td class="p-3 text-center">
                <span class="px-3 py-1 rounded-full text-xs font-semibold bg-[#ccff33] text-[#006400]">
                    <?= $r['usia_kehamilan']; ?> bulan
                </span>
            </td>

            <!-- AKSI -->
            <?php if($_SESSION['role'] == 'admin'): ?>
            <td class="p-3">
                <div class="flex justify-center gap-2">

                    <a href="dashboard_admin.php?page=kelola_ibu_hamil_edit&id=<?= $r['id']; ?>"
                       class="flex items-center gap-1 bg-[#38b000] text-white px-3 py-1 rounded-lg hover:bg-[#2d8600] transition text-xs shadow">
                        <i class='bx bx-edit'></i>
                        Edit
                    </a>

                    <a href="dashboard_admin.php?page=kelola_ibu_hamil_hapus&id=<?= $r['id']; ?>"
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
        </tbody>

    </table>
    </div>

</div>
</main>