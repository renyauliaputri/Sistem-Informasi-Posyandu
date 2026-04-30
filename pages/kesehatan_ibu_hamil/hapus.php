<?php

$id = $_GET['id'] ?? 0;

// validasi sederhana
if($id){
    mysqli_query($connect,"
        DELETE FROM kesehatan_ibu_hamil 
        WHERE id='$id'
    ");
}

// redirect balik
echo "<script>
location='dashboard_kader.php?page=kesehatan_ibu_hamil';
</script>";