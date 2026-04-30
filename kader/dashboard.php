<?php require "../auth/cek_kader.php"; ?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard Kader</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex">

<!-- SIDEBAR -->
<aside class="w-64 bg-blue-700 text-white min-h-screen">
    
    <div class="p-4 text-xl font-bold border-b border-blue-600">
        POSYANDU KADER
    </div>

    <nav class="p-4 space-y-2">

        <a href="dashboard.php"
           class="block px-4 py-2 rounded hover:bg-blue-600">
           Dashboard
        </a>

        <a href="balita.php"
           class="block px-4 py-2 rounded hover:bg-blue-600">
           Data Balita
        </a>

        <a href="penimbangan.php"
           class="block px-4 py-2 rounded hover:bg-blue-600">
           Penimbangan
        </a>

        <a href="imunisasi.php"
           class="block px-4 py-2 rounded hover:bg-blue-600">
           Riwayat Imunisasi
        </a>

        <a href="ibu_hamil.php"
           class="block px-4 py-2 rounded hover:bg-blue-600">
           Data Ibu Hamil
        </a>

        <a href="../auth/logout.php"
           class="block px-4 py-2 rounded hover:bg-red-600">
           Logout
        </a>

    </nav>
</aside>

<!-- MAIN CONTENT -->
<div class="flex-1">

    <!-- NAVBAR -->
    <div class="bg-white shadow p-4 flex justify-between">
        <h1 class="font-bold text-lg">Dashboard Kader</h1>
        <div>Halo, <?= $_SESSION['nama']; ?></div>
    </div>

    <!-- CONTENT -->
    <div class="p-6">

        <h2 class="text-2xl font-bold mb-4">
            Selamat Datang 👋
        </h2>

        <!-- CARD FITUR -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            <div class="bg-white p-4 rounded shadow">
                <h3 class="font-bold">Data Balita</h3>
                <p class="text-sm text-gray-500">Kelola data balita</p>
            </div>

            <div class="bg-white p-4 rounded shadow">
                <h3 class="font-bold">Penimbangan</h3>
                <p class="text-sm text-gray-500">Input berat & tinggi</p>
            </div>

            <div class="bg-white p-4 rounded shadow">
                <h3 class="font-bold">Imunisasi</h3>
                <p class="text-sm text-gray-500">Riwayat imunisasi</p>
            </div>

        </div>

    </div>

</div>

</body>
</html>
