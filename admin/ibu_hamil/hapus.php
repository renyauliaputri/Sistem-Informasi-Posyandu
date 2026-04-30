<?php
require "../../auth/cek_admin.php";
require "../../config/koneksi.php";

$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM ibu_hamil WHERE id='$id'");

header("Location: index.php");
