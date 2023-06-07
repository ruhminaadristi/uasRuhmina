<?php
include('koneksi.php');
session_start();

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $jml = $_POST['jumlah'];

    $statement = $koneksi->prepare("update t_pesanan set jumlah = ? where id_pesanan = ?");
    $statement->bind_param("ii",$jml,$id);
    $statement->execute();

    if($statement == true){
        echo "<script>alert('Berhasil mengupdate data')</script>";
        echo '<script>window.location.href = "../php/viewData.php";</script>';
    }else{
        echo "<script>alert('Gagal mengupdate data')</script>";
        echo '<script>window.location.href = "../php/editData.php";</script>';
    }
}else{
    echo $koneksi->error;
}

?>
