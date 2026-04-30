<?php

// =======================
// QUERY DATA (SESUAI TABEL)
// =======================
$total_user = mysqli_fetch_assoc(mysqli_query($connect, "SELECT COUNT(*) as total FROM user"))['total'];
$total_balita = mysqli_fetch_assoc(mysqli_query($connect, "SELECT COUNT(*) as total FROM balita"))['total'];
$total_ibu = mysqli_fetch_assoc(mysqli_query($connect, "SELECT COUNT(*) as total FROM ibu_hamil"))['total'];
$total_imunisasi = mysqli_fetch_assoc(mysqli_query($connect, "SELECT COUNT(*) as total FROM riwayat_imunisasi"))['total'];
$total_penimbangan = mysqli_fetch_assoc(mysqli_query($connect, "SELECT COUNT(*) as total FROM penimbangan"))['total'];

// =======================
// DATA CHART (PER BULAN)
// =======================
$data_chart = mysqli_query($connect, "
    SELECT MONTH(tanggal_penimbangan) as bulan, COUNT(*) as total 
    FROM penimbangan 
    GROUP BY MONTH(tanggal_penimbangan)
");

$bulan = [];
$total = [];

$nama_bulan = [
    1=>"Jan",2=>"Feb",3=>"Mar",4=>"Apr",5=>"Mei",6=>"Jun",
    7=>"Jul",8=>"Agu",9=>"Sep",10=>"Okt",11=>"Nov",12=>"Des"
];

while ($row = mysqli_fetch_assoc($data_chart)) {
    $bulan[] = $nama_bulan[$row['bulan']];
    $total[] = $row['total'];
}

// =======================
// DATA TERBARU (JOIN)
// =======================
$recent = mysqli_query($connect, "
    SELECT b.nama_balita, p.tanggal_penimbangan, p.berat_badan, p.tinggi_badan
    FROM penimbangan p
    JOIN balita b ON p.id_balita = b.id
    ORDER BY p.tanggal_penimbangan DESC
    LIMIT 5
");
?>

<!-- BOXICONS -->
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<div class="bg-gray-100 min-h-screen">

<div class="p-6 space-y-6 max-w-7xl mx-auto">

    <!-- TITLE -->
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-700 flex items-center gap-2">
            <i class='bx bx-dashboard text-3xl text-[#38b000]'></i>
            Dashboard Admin
        </h1>
        <p class="text-sm text-gray-500">
            <?= date('l, d M Y') ?>
        </p>
    </div>

    <!-- ===================== -->
    <!-- SUMMARY CARD -->
    <!-- ===================== -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-5">

    <?php 
    function card($title, $total, $color, $icon) {
    ?>
    <div class="group bg-white p-5 rounded-2xl shadow hover:shadow-xl transition border-l-4 <?= $color ?>">
        <div class="flex justify-between items-center">

            <div>
                <p class="text-sm text-gray-500"><?= $title ?></p>
                <h2 class="text-2xl font-bold text-gray-700"><?= $total ?></h2>
            </div>

            <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-gray-100 group-hover:scale-110 transition">
                <i class='bx <?= $icon ?> text-2xl <?= $color ?>'></i>
            </div>

        </div>
    </div>
    <?php } ?>

    <?php 
    card("Users", $total_user, "text-[#006400] border-[#006400]", "bx-group");
    card("Balita", $total_balita, "text-[#38b000] border-[#38b000]", "bx-child");
    card("Ibu Hamil", $total_ibu, "text-[#006400] border-[#006400]", "bx-heart");
    card("Imunisasi", $total_imunisasi, "text-[#ccff33] border-[#ccff33]", "bx-shield");
    card("Penimbangan", $total_penimbangan, "text-[#38b000] border-[#38b000]", "bx-line-chart");
    ?>

    </div>

    <!-- ===================== -->
    <!-- GRID -->
    <!-- ===================== -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- CHART -->
        <div class="lg:col-span-2 bg-white p-5 rounded-2xl shadow">
            <h2 class="text-lg font-semibold mb-4 flex items-center gap-2">
                <i class='bx bx-line-chart text-[#38b000]'></i>
                Grafik Penimbangan
            </h2>
            <canvas id="chartPenimbangan"></canvas>
        </div>

        <!-- QUICK INFO -->
        <div class="bg-white p-5 rounded-2xl shadow space-y-4">
            <h2 class="text-lg font-semibold flex items-center gap-2">
                <i class='bx bx-info-circle text-[#38b000]'></i>
                Informasi Cepat
            </h2>

            <div class="flex justify-between text-sm">
                <span class="flex items-center gap-2">
                    <i class='bx bx-data'></i> Total Data
                </span>
                <span class="font-bold text-[#006400]">
                    <?= $total_user + $total_balita + $total_ibu ?>
                </span>
            </div>

            <div class="flex justify-between text-sm">
                <span class="flex items-center gap-2">
                    <i class='bx bx-pulse'></i> Aktivitas
                </span>
                <span class="font-bold text-[#38b000]">Aktif</span>
            </div>

            <div class="flex justify-between text-sm">
                <span class="flex items-center gap-2">
                    <i class='bx bx-wifi'></i> Status
                </span>
                <span class="text-[#38b000] font-bold">Online</span>
            </div>

        </div>

    </div>

    <!-- ===================== -->
    <!-- TABLE -->
    <!-- ===================== -->
    <div class="bg-white p-5 rounded-2xl shadow">
        <h2 class="text-lg font-semibold mb-4 flex items-center gap-2">
            <i class='bx bx-history text-[#38b000]'></i>
            Penimbangan Terbaru
        </h2>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="p-3 text-left">Nama Balita</th>
                        <th class="p-3 text-center">Tanggal</th>
                        <th class="p-3 text-center">Berat</th>
                        <th class="p-3 text-center">Tinggi</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($r = mysqli_fetch_assoc($recent)) { ?>
                    <tr class="border-b hover:bg-gray-50 transition">
                        <td class="p-3 font-medium"><?= $r['nama_balita'] ?></td>
                        <td class="p-3 text-center"><?= $r['tanggal_penimbangan'] ?></td>
                        <td class="p-3 text-center"><?= $r['berat_badan'] ?> kg</td>
                        <td class="p-3 text-center"><?= $r['tinggi_badan'] ?> cm</td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

    </div>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('chartPenimbangan').getContext('2d');

const gradient = ctx.createLinearGradient(0, 0, 0, 300);
gradient.addColorStop(0, "rgba(56,176,0,0.4)");
gradient.addColorStop(1, "rgba(56,176,0,0)");

new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?= json_encode($bulan) ?>,
        datasets: [{
            label: 'Penimbangan',
            data: <?= json_encode($total) ?>,
            fill: true,
            backgroundColor: gradient,
            borderColor: "#006400",
            borderWidth: 3,
            tension: 0.4,
            pointRadius: 4
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false }
        }
    }
});
</script>