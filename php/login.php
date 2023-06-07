<?php
include('koneksi.php');
session_start();

if(isset($_SESSION['username'])){
    header("Location: ../html/tiket.html");
}

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "select * from pengguna where username = '$username' and password = '$password'";
    $result = $koneksi->query($query);

    if($result->num_rows==1){
        $_SESSION['username'] = $username;
        echo "<script>alert('Berhasil login');</script>";
        header("Location: ../html/tiket.html");
    }else{
        echo "<script>alert('Username atau password salah')</script>";
    }
}
?>