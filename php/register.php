<?php
include('koneksi.php');

if(isset($_POST['daftar'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $noHP = $_POST['noHP'];
    $alamat = $_POST['alamat'];
    $pekerjaan = $_POST['pekerjaan'];

    $query = "select * from pengguna where username = '$username'";
    $result = $koneksi->query($query);

    if(mysqli_num_rows($result) > 0){
        $error = "Username sudah digunakan. Gunakan username lainnya!";
    }else{
        $query = "insert into pengguna (username,password,noHP,alamat,pekerjaan) values('$username','$password','$noHP','$alamat','$pekerjaan')";
        $result = $koneksi->query($query);
        if($result == true){
            $hasil = "<script>alert('Berhasil mendaftar akun')</script>";
            echo $hasil;
            echo '<script>window.location.href = "../html/index.html";</script>';
        }else{
            echo "Gagal membuat akun " . $koneksi->error;
        }
    }
}
$koneksi->close();

?>