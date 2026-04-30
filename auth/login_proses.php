<?php
session_start();
require "../config/connection.php";

$email    = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query($connect, "
    SELECT * FROM user 
    WHERE email='$email' AND password='$password'
");

$data = mysqli_fetch_assoc($query);

if ($data) {
    $_SESSION['login'] = true;
    $_SESSION['id']    = $data['id'];
    $_SESSION['nama']  = $data['fullname'];
    $_SESSION['role']  = $data['role'];

    if ($data['role'] == 'admin') {
        header("Location: ../dashboard_admin.php");
    } elseif ($data['role'] == 'kader') {
        header("Location: ../dashboard_kader.php");
    } else {
        echo "Role tidak dikenali";
    }
} else {
    echo "<script>alert('Login gagal');location='login.php';</script>";
}
