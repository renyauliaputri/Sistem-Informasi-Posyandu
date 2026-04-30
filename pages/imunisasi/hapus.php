<?php

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $hapus = mysqli_query($connect,
        "DELETE FROM imunisasi WHERE id='$id'"
    );

    if($hapus){
        header("Location: dashboard_admin.php?page=kelola_imunisasi");
        exit;
    }else{
        echo "Gagal hapus data";
    }

}else{
    echo "ID tidak ditemukan";
}
