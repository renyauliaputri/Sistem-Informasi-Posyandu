<?php

$id = $_GET['id'];
mysqli_query($connect, "DELETE FROM balita WHERE id='$id'");

header("Location: dashboard_admin.php?page=kelola_balita");

?>
