<?php
$id = intval($_GET['id']);

// ambil data
$data = mysqli_fetch_assoc(mysqli_query($connect,"
    SELECT * FROM penimbangan WHERE id='$id'
"));

// ambil balita
$balita = mysqli_query($connect,"SELECT * FROM balita");

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    mysqli_query($connect,"
        UPDATE penimbangan SET
        id_balita = '$_POST[id_balita]',
        tanggal_penimbangan = '$_POST[tanggal]',
        berat_badan = '$_POST[berat]',
        tinggi_badan = '$_POST[tinggi]'
        WHERE id='$id'
    ");

    header("Location: dashboard_kader.php?page=penimbangan");
}
?>

<main class="p-6 bg-gray-100">

<div class="max-w-xl mx-auto">

<div class="bg-white p-6 rounded-2xl shadow-lg border">

<!-- HEADER -->
<div class="mb-6">
    <h1 class="text-xl font-semibold text-gray-700 flex items-center gap-2">
        <i class='bx bx-edit text-2xl text-yellow-500'></i>
        Edit Penimbangan
    </h1>
    <p class="text-sm text-gray-500">Perbarui data penimbangan</p>
</div>

<form method="POST" class="space-y-4">

<!-- BALITA -->
<div>
<label class="text-sm text-gray-600">Nama Balita</label>
<select name="id_balita"
class="w-full border px-4 py-2 rounded-xl mt-1 focus:ring-2 focus:ring-green-500">

<?php while($b=mysqli_fetch_assoc($balita)): ?>
<option value="<?= $b['id']; ?>"
<?= $b['id']==$data['id_balita']?'selected':''; ?>>
<?= $b['nama_balita']; ?>
</option>
<?php endwhile; ?>

</select>
</div>

<!-- TANGGAL -->
<div>
<label class="text-sm text-gray-600">Tanggal</label>
<input type="date" name="tanggal"
value="<?= $data['tanggal_penimbangan']; ?>"
class="w-full border px-4 py-2 rounded-xl mt-1 focus:ring-2 focus:ring-green-500">
</div>

<!-- BERAT -->
<div>
<label class="text-sm text-gray-600">Berat Badan</label>
<input type="number" name="berat"
value="<?= $data['berat_badan']; ?>"
class="w-full border px-4 py-2 rounded-xl mt-1 focus:ring-2 focus:ring-green-500">
</div>

<!-- TINGGI -->
<div>
<label class="text-sm text-gray-600">Tinggi Badan</label>
<input type="number" name="tinggi"
value="<?= $data['tinggi_badan']; ?>"
class="w-full border px-4 py-2 rounded-xl mt-1 focus:ring-2 focus:ring-green-500">
</div>

<!-- BUTTON -->
<div class="flex justify-between pt-4">

<a href="dashboard_kader.php?page=penimbangan"
class="text-gray-500 text-sm hover:text-gray-700">
← Kembali
</a>

<button class="bg-gradient-to-r from-yellow-500 to-yellow-600 text-white px-5 py-2 rounded-xl shadow hover:scale-105 transition">
Update
</button>

</div>

</form>

</div>
</div>
</main>