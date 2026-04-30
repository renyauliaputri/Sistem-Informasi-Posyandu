<?php

$id = $_GET['id'];
mysqli_query($connect, "DELETE FROM user WHERE id='$id'");

header("Location: dashboard_admin.php?page=user");

?>