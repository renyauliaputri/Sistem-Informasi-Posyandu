<?php
$koneksi = mysqli_connect("localhost", "root", "", "posyandu");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
