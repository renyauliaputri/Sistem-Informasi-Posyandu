<?php
ob_start();
session_start();
// agar tidak bisa akses langsung tanpa loging
if(!isset($_SESSION["id"])) {
   header("Location: login.php");
   exit();
}
// masukkan file connection
require "config/connection.php";

// route setiap halaman
require "config/routes_kader.php";

// ambil nilai page yang url menggunakan GET
// jika halaman tidak ditemukan arahkan ke home
$page = $_GET["page"] ?? "home";

// atur halaman yang tampil berdasarkan nilai page

$page_file = $pages[$page] ?? $pages["home"];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Dashboard Kader</title>

  <!-- POPPINS FONT -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="bg-gray-100">
 
  <div class="flex">
 
    <!-- Sidebar -->
    <?php include "components/kader/sidebar.php" ?>
	<!-- End Sidebar -->
 
    <!-- Main Content -->
    <div class="flex-1 md:ml-64 flex flex-col min-h-screen">
 
      <!-- Topbar -->
      <?php include "components/kader/topbar.php" ?>
	  <!-- End Topbar -->

      <!-- Content -->
      <main class=" p-6 flex-1">
        <?php include $page_file ?>
        
      </main>
	  <!-- End Content -->
 
    </div>
	<!-- End Main Content -->

  </div>
 
</body>
</html>
<?php ob_end_flush()?>