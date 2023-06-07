<?php
$koneksi = new mysqli("localhost","root","","db_bioskop");

if($koneksi->connect_error){
    die("Gagal menghubungkan: ". $koneksi->connect_error);
}else{
    //echo "Berhasil menghubungkan";
}
?>