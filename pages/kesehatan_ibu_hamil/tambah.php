<?php
$ibu = mysqli_query($connect,"SELECT * FROM ibu_hamil");

if(isset($_POST['simpan'])){
    mysqli_query($connect,"
        INSERT INTO kesehatan_ibu_hamil 
        (id_ibu_hamil,tanggal,berat_badan,tekanan_darah,status_kesehatan)
        VALUES(
            '$_POST[id_ibu_hamil]',
            '$_POST[tanggal]',
            '$_POST[berat_badan]',
            '$_POST[tekanan_darah]',
            '$_POST[status_kesehatan]'
        )
    ");

    echo "<script>location='dashboard_kader.php?page=kesehatan_ibu_hamil';</script>";
}
?>

<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<main class="p-6 bg-gray-100">

<div class="max-w-xl mx-auto bg-white p-6 rounded-2xl shadow-lg">

<!-- TITLE -->
<h2 class="text-xl font-semibold text-[#006400] flex items-center gap-2 mb-4">
<i class='bx bx-plus-circle'></i>Tambah Data Kesehatan Ibu
</h2>

<!-- ✅ FORM DIMULAI DI SINI -->
<form method="post" class="space-y-4">

    <!-- PILIH IBU -->
    <div>
        <label class="text-sm text-gray-600">Nama Ibu</label>
        <select name="id_ibu_hamil" class="w-full border p-3 rounded-xl">
            <?php while($i=mysqli_fetch_assoc($ibu)): ?>
            <option value="<?= $i['id'] ?>"><?= $i['nama_ibu'] ?></option>
            <?php endwhile; ?>
        </select>
    </div>

    <!-- TANGGAL -->
    <div>
        <label class="text-sm text-gray-600">Tanggal</label>
        <input type="date" name="tanggal" class="w-full border p-3 rounded-xl">
    </div>

    <!-- BERAT -->
    <div>
        <label class="text-sm text-gray-600">Berat Badan</label>
        <input type="number" step="0.01" name="berat_badan"
        placeholder="Contoh: 60"
        class="w-full border p-3 rounded-xl">
    </div>

    <!-- TEKANAN -->
    <div>
        <label class="text-sm text-gray-600">Tekanan Darah</label>
        <input type="text" name="tekanan_darah"
        placeholder="120/80"
        class="w-full border p-3 rounded-xl">
    </div>

    <!-- STATUS -->
    <div>
        <label class="text-sm text-gray-600">Status Kesehatan</label>
        <select name="status_kesehatan" class="w-full border p-3 rounded-xl">
            <option value="sehat">Sehat</option>
            <option value="sakit">Sakit</option>
        </select>
    </div>

    <!-- BUTTON -->
    <div class="flex justify-between items-center pt-2">
        
        <a href="dashboard_kader.php?page=kesehatan_ibu"
           class="text-sm text-gray-500 hover:text-gray-700">
           ← Kembali
        </a>

        <button name="simpan"
        class="flex items-center gap-2 bg-[#38b000] text-white px-6 py-2 rounded-xl hover:bg-[#2d8600] transition shadow">
            <i class='bx bx-save'></i>
            Simpan
        </button>

    </div>

</form>
<!-- ✅ FORM SELESAI -->

</div>
</main>