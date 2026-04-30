<?php
$connect = mysqli_connect("localhost", "root", "", "posyandu");

if (!$connect) {
    die("Eror" . mysqli_connect());
}