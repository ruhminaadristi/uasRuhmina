<?php
include('koneksi.php');
session_start();

if(isset($_GET['id_pesanan'])){
    $id = $_GET['id_pesanan'];

    $statement = $koneksi->prepare("delete from t_pesanan where id_pesanan = ?");
    $statement->bind_param("i",$id);
    $statement->execute();

    if($statement == true){
        echo "<script>alert('Berhasil menghapus data')</script>";
        echo '<script>window.location.href = "../php/viewData.php";</script>';
    }else{
        echo "<script>alert('Gagal menghapus data')</script>";
        echo '<script>window.location.href = "../php/viewData.php";</script>';
    }
}else{
    echo $koneksi->error;
}

?>
