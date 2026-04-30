<?php
$page = $_GET["page"] ?? "home";

/* =========================
   CONFIG TITLE + ICON
========================= */
$pages = [
    "home" => ["Dashboard", "bx-home-alt-2"],
    "user" => ["Manajemen Users", "bx-group"],
    "kelola_ibu_hamil" => ["Kelola Ibu Hamil", "bx-female"],
    "kelola_balita" => ["Kelola Balita", "bx-baby-carriage"],
    "kelola_imunisasi" => ["Kelola Imunisasi", "bx-shield-plus"],
    "kesehatan_balita" => ["Kesehatan Balita", "bx-plus-medical"],
    "kesehatan_ibu_hamil" => ["Kesehatan Ibu Hamil", "bx-heart-circle"],
    "penimbangan" => ["Penimbangan", "bx-line-chart"],
    "imunisasi" => ["Imunisasi", "bx-injection"],
    "kegiatan" => ["Kegiatan Posyandu", "bx-calendar-event"]
];

$title = $pages[$page][0] ?? "Dashboard";
$icon  = $pages[$page][1] ?? "bx-home-alt-2";
?>

<!-- BOXICONS -->
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<!-- TOPBAR -->
<div class="fixed h-[69px] top-0 right-0 left-[16rem] 
bg-gradient-to-r from-[#006400] via-[#38b000] to-[#006400] 
text-white px-6 shadow-xl flex justify-between items-center z-40">

    <!-- LEFT (ICON + TITLE) -->
    <div class="flex items-center gap-3">

        <div class="w-12 h-12 bg-white/20 flex items-center justify-center rounded-xl backdrop-blur">
            <i class='bx <?= $icon ?> text-2xl text-[#ccff33]'></i>
        </div>

        <div>
            <h1 class="text-xl font-bold leading-tight"><?= $title ?></h1>
            <p class="text-xs opacity-80">
                Dashboard Admin Posyandu
            </p>
        </div>

    </div>

    <!-- RIGHT (PROFILE) -->
    <div class="flex items-center gap-3 bg-white/10 backdrop-blur px-4 py-2 rounded-xl border border-white/20">

        <div class="w-10 h-10 bg-[#ccff33] text-[#006400] flex items-center justify-center rounded-full font-bold shadow">
            <?= strtoupper(substr($_SESSION['nama'],0,1)); ?>
        </div>

        <div class="leading-tight">
            <p class="text-xs opacity-80">Selamat datang 👋</p>
            <p class="font-semibold text-sm"><?= $_SESSION['nama']; ?></p>
        </div>

    </div>

</div>
