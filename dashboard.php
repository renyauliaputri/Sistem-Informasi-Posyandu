<?php
require "auth/cek_admin.php";
require "config/koneksi.php";

$qIbu = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM ibu_hamil");
$ibu  = mysqli_fetch_assoc($qIbu);

require "config/routes_admin.php";

$page = $_GET['page'] ?? 'home';
$page_file = $pages[$page] ?? $pages['home'];

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
    
    
<?php include "layout/sidebar.php"; ?>
<?php include "layout/navbar.php"; ?>

    <main class="flex-1 p-6">
    
        <?php include $page_file;?>
    
    </main>
    
    
    
</body>
</html>

