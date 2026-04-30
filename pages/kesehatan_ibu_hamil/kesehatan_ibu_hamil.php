<?php
$role = $_SESSION['role'] ?? '';

$search = $_GET['search'] ?? '';

if($search){
    $data = mysqli_query($connect,"
        SELECT k.*, i.nama_ibu
        FROM kesehatan_ibu_hamil k
        JOIN ibu_hamil i ON k.id_ibu_hamil = i.id
        WHERE i.nama_ibu LIKE '%$search%'
        OR k.tanggal LIKE '%$search%'
        ORDER BY k.id DESC
    ");
}else{
    $data = mysqli_query($connect,"
        SELECT k.*, i.nama_ibu
        FROM kesehatan_ibu_hamil k
        JOIN ibu_hamil i ON k.id_ibu_hamil = i.id
        ORDER BY k.id DESC
    ");
}
?>

<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<main class="p-6 bg-gray-100">
<div class="bg-white p-6 rounded-2xl shadow-lg">

<!-- HEADER -->
<div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">
    
    <h1 class="text-2xl font-semibold text-gray-700 flex items-center gap-2">
        <i class='bx bx-heart text-3xl text-[#38b000]'></i>
        Data Kesehatan Ibu Hamil
    </h1>

    <div class="flex flex-col sm:flex-row gap-2">

        <!-- SEARCH -->
        <form method="GET" class="flex items-center gap-2 bg-gray-100 px-3 py-2 rounded-xl shadow-sm">
            <input type="hidden" name="page" value="kesehatan_ibu">

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
        <a href="dashboard_kader.php?page=kesehatan_ibu_hamil_tambah"
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
<tr class="bg-gray-100 text-gray-600 text-sm">
    <th class="p-3 text-left">No</th>
    <th class="p-3 text-left">Nama Ibu</th>
    <th class="p-3 text-center">Tanggal</th>
    <th class="p-3 text-center">BB</th>
    <th class="p-3 text-center">Tekanan</th>
    <th class="p-3 text-center">Status</th>
    <?php if($role != 'admin'): ?>
    <th class="p-3 text-center">Aksi</th>
    <?php endif; ?>
</tr>
</thead>

<tbody>
<?php if(mysqli_num_rows($data)>0): ?>
<?php $no=1; while($row=mysqli_fetch_assoc($data)): ?>
<tr class="border-b hover:bg-gray-50 transition">

<td class="p-3"><?= $no++ ?></td>

<td class="p-3">
    <div class="flex items-center gap-2">
        <i class='bx bx-female text-[#38b000]'></i>
        <span class="font-medium"><?= $row['nama_ibu'] ?></span>
    </div>
</td>

<td class="p-3 text-center"><?= date('d-m-Y', strtotime($row['tanggal'])) ?></td>

<td class="p-3 text-center">
<span class="px-2 py-1 rounded bg-[#ccff33] text-[#006400] text-xs font-semibold">
<?= $row['berat_badan'] ?> kg
</span>
</td>

<td class="p-3 text-center">
<span class="px-2 py-1 rounded bg-[#38b000] text-white text-xs font-semibold">
<?= $row['tekanan_darah'] ?>
</span>
</td>

<td class="p-3 text-center">
<span class="px-3 py-1 rounded-full text-xs font-semibold
<?= $row['status_kesehatan']=='sehat' 
? 'bg-[#ccff33] text-[#006400]' 
: 'bg-red-100 text-red-600' ?>">
<?= ucfirst($row['status_kesehatan']) ?>
</span>
</td>

<?php if($role != 'admin'): ?>
<td class="p-3">
<div class="flex justify-center gap-2">

<a href="dashboard_kader.php?page=kesehatan_ibu_hamil_edit&id=<?= $row['id'] ?>"
class="flex items-center gap-1 bg-[#38b000] text-white px-3 py-1 rounded-lg hover:bg-[#2d8600] text-xs shadow">
<i class='bx bx-edit'></i>Edit</a>

<a href="dashboard_kader.php?page=kesehatan_ibu_hamil_hapus&id=<?= $row['id'] ?>"
onclick="return confirm('Hapus data?')"
class="flex items-center gap-1 bg-[#006400] text-white px-3 py-1 rounded-lg hover:bg-[#004d00] text-xs shadow">
<i class='bx bx-trash'></i>Hapus</a>

</div>
</td>
<?php endif; ?>

</tr>
<?php endwhile; ?>
<?php else: ?>
<tr>
<td colspan="7" class="p-6 text-center text-gray-400">
<i class='bx bx-info-circle text-2xl'></i><br>
Data tidak ditemukan
</td>
</tr>
<?php endif; ?>
</tbody>

</table>
</div>

</div>
</main>