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
require "config/routes_admin.php";

// ambil nilai page yang url menggunakan GET
// jika halaman tidak ditemukan arahkan ke home
$page = $_GET["page"] ?? "home";

// atur halaman yang tampil berdasarkan nilai page

$page_file = $pages[$page] ?? $pages["home"];

$qIbu = mysqli_query($connect, "SELECT COUNT(*) AS total FROM ibu_hamil");
$ibu  = mysqli_fetch_assoc($qIbu);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- TAILWIND -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- POPPINS FONT -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>

  <title>Dashboard Admin</title>
</head>

<body class="bg-gray-100">

<div class="flex">

    <!-- SIDEBAR -->
    <?php include "components/admin/sidebar.php" ?>

    <!-- CONTENT WRAPPER -->
    <div class="flex-1 md:ml-64 flex flex-col min-h-screen">

        <!-- TOPBAR -->
        <?php include "components/admin/topbar.php" ?>

        <!-- CONTENT -->
        <main class="pt-20 p-6 bg-gray-100 flex-1">
            <?php include $page_file ?>
        </main>

    </div>

</div>

</body>
</html>
<?php ob_end_flush();?>