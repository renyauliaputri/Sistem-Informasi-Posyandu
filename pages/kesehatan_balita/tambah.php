<?php
$balita = mysqli_query($connect,"SELECT * FROM balita");

if(isset($_POST['simpan'])){
    mysqli_query($connect,"
    INSERT INTO kesehatan_balita (id_balita, tanggal, status_kesehatan)
    VALUES (
        '$_POST[id_balita]',
        '$_POST[tanggal]',
        '$_POST[status_kesehatan]'
    )
    ");
    echo "<script>location='dashboard_kader.php?page=kesehatan_balita';</script>";
}
?>

<form method="post" class="bg-white p-6 rounded-2xl shadow space-y-4">
    <h2 class="text-xl font-semibold text-[#006400]">Tambah Kesehatan Balita</h2>

    <select name="id_balita" class="w-full border p-3 rounded-xl">
        <?php while($b=mysqli_fetch_assoc($balita)): ?>
        <option value="<?= $b['id'] ?>"><?= $b['nama_balita'] ?></option>
        <?php endwhile; ?>
    </select>

    <input type="date" name="tanggal" class="w-full border p-3 rounded-xl">

    <select name="status_kesehatan" class="w-full border p-3 rounded-xl">
        <option value="sehat">Sehat</option>
        <option value="sakit">Sakit</option>
    </select>

    <button name="simpan" class="bg-[#38b000] text-white px-6 py-3 rounded-xl">
        Simpan
    </button>
</form>