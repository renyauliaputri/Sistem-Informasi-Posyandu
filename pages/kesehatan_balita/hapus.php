<?php
$id = $_GET['id'];

mysqli_query($connect,"
    DELETE FROM kesehatan_balita
    WHERE id='$id'
");

echo "<script>
location='dashboard_kader.php?page=kesehatan_balita';
</script>";
?>