<?php
$id = intval($_GET['id']);

mysqli_query($connect, "
    DELETE FROM penimbangan WHERE id='$id'
");

header("Location: dashboard_kader.php?page=penimbangan");
?>