<?php
$id = $_GET['id'];
$edit = mysqli_fetch_assoc(mysqli_query($connect,"
    SELECT * FROM kesehatan_balita WHERE id='$id'
"));
$balita = mysqli_query($connect,"SELECT * FROM balita");

if(isset($_POST['update'])){
    mysqli_query($connect,"
        UPDATE kesehatan_balita SET
        id_balita='$_POST[id_balita]',
        tanggal='$_POST[tanggal]',
        status_kesehatan='$_POST[status_kesehatan]'
        WHERE id='$id'
    ");
    echo "<script>location='dashboard_kader.php?page=kesehatan_balita';</script>";
}
?>

<form method="post" class="bg-white p-6 rounded-2xl shadow space-y-4">
    <h2 class="text-xl font-semibold text-[#006400]">Edit Kesehatan Balita</h2>

    <select name="id_balita" class="w-full border p-3 rounded-xl">
        <?php while($b=mysqli_fetch_assoc($balita)): ?>
        <option value="<?= $b['id'] ?>" <?= $b['id']==$edit['id_balita']?'selected':'' ?>>
            <?= $b['nama_balita'] ?>
        </option>
        <?php endwhile; ?>
    </select>

    <input type="date" name="tanggal" value="<?= $edit['tanggal'] ?>" class="w-full border p-3 rounded-xl">

    <select name="status_kesehatan" class="w-full border p-3 rounded-xl">
        <option value="sehat" <?= $edit['status_kesehatan']=='sehat'?'selected':'' ?>>Sehat</option>
        <option value="sakit" <?= $edit['status_kesehatan']=='sakit'?'selected':'' ?>>Sakit</option>
    </select>

    <button name="update" class="bg-[#38b000] text-white px-6 py-3 rounded-xl">
        Update
    </button>
</form>