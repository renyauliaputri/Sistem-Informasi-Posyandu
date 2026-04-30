<?php
require "../../auth/cek_admin.php";
require "../../config/koneksi.php";

$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM balita WHERE id='$id'");

header("Location: index.php");
