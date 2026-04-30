<?php
$id = $_GET['id'];

$edit = mysqli_fetch_assoc(mysqli_query($connect,"
    SELECT * FROM kesehatan_ibu_hamil WHERE id='$id'
"));

$ibu = mysqli_query($connect,"SELECT * FROM ibu_hamil");

if(isset($_POST['update'])){
    mysqli_query($connect,"
        UPDATE kesehatan_ibu_hamil SET
        id_ibu_hamil='$_POST[id_ibu_hamil]',
        tanggal='$_POST[tanggal]',
        berat_badan='$_POST[berat_badan]',
        tekanan_darah='$_POST[tekanan_darah]',
        status_kesehatan='$_POST[status_kesehatan]'
        WHERE id='$id'
    ");

    echo "<script>location='dashboard_kader.php?page=kesehatan_ibu_hamil';</script>";
}
?>

<!-- BOXICONS -->
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<main class="p-6 bg-gray-100">

<div class="max-w-xl mx-auto bg-white p-6 rounded-2xl shadow-lg space-y-4">

    <!-- TITLE -->
    <h2 class="text-xl font-semibold text-[#006400] flex items-center gap-2">
        <i class='bx bx-edit'></i>
        Edit Kesehatan Ibu Hamil
    </h2>

    <!-- FORM -->
    <form method="post" class="space-y-4">

        <!-- PILIH IBU -->
        <div>
            <label class="text-sm text-gray-600">Nama Ibu</label>
            <select name="id_ibu_hamil" class="w-full border p-3 rounded-xl">
                <?php while($i=mysqli_fetch_assoc($ibu)): ?>
                <option value="<?= $i['id'] ?>" 
                    <?= $i['id']==$edit['id_ibu_hamil']?'selected':'' ?>>
                    <?= $i['nama_ibu'] ?>
                </option>
                <?php endwhile; ?>
            </select>
        </div>

        <!-- TANGGAL -->
        <div>
            <label class="text-sm text-gray-600">Tanggal</label>
            <input type="date" 
                   name="tanggal" 
                   value="<?= $edit['tanggal'] ?>"
                   class="w-full border p-3 rounded-xl">
        </div>

        <!-- BERAT BADAN -->
        <div>
            <label class="text-sm text-gray-600">Berat Badan (kg)</label>
            <input type="number" step="0.01"
                   name="berat_badan"
                   value="<?= $edit['berat_badan'] ?>"
                   class="w-full border p-3 rounded-xl">
        </div>

        <!-- TEKANAN DARAH -->
        <div>
            <label class="text-sm text-gray-600">Tekanan Darah</label>
            <input type="text"
                   name="tekanan_darah"
                   value="<?= $edit['tekanan_darah'] ?>"
                   placeholder="Contoh: 120/80"
                   class="w-full border p-3 rounded-xl">
        </div>

        <!-- STATUS -->
        <div>
            <label class="text-sm text-gray-600">Status Kesehatan</label>
            <select name="status_kesehatan" class="w-full border p-3 rounded-xl">
                <option value="sehat" <?= $edit['status_kesehatan']=='sehat'?'selected':'' ?>>Sehat</option>
                <option value="sakit" <?= $edit['status_kesehatan']=='sakit'?'selected':'' ?>>Sakit</option>
            </select>
        </div>

        <!-- BUTTON -->
        <div class="flex justify-between items-center pt-2">
            
            <a href="dashboard_kader.php?page=kesehatan_ibu"
               class="text-sm text-gray-500 hover:text-gray-700">
               ← Kembali
            </a>

            <button name="update"
                class="flex items-center gap-2 bg-[#38b000] text-white px-6 py-2 rounded-xl hover:bg-[#2d8600] transition shadow">
                <i class='bx bx-save'></i>
                Update
            </button>

        </div>

    </form>

</div>

</main>