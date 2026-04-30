<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['role'] != 'kader') {
    header("Location: ../auth/login.php");
    exit;
}
