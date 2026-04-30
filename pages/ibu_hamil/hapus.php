<?php

$id = $_GET['id'];
mysqli_query($connect, "DELETE FROM ibu_hamil WHERE id='$id'");

header("Location: dashboard_admin.php?page=kelola_ibu_hamil");

?>
