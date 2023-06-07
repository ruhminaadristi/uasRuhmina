<?php
include('koneksi.php');
session_start();

if(!isset($_SESSION['username'])){
    header("Location: ../html/index.html");
}else{
    $username = $_SESSION['username'];
}



if(isset($_POST['pesanFilm'])){
    $jml = $_POST['jumlah'];
    $judul = "endGame";

    $statement = $koneksi->prepare("insert into t_pesanan(judul,jumlah,username) values(?,?,?)");
    $statement->bind_param("sis",$judul,$jml,$username);
    $statement->execute();
    if($statement == true){
        echo "<script>alert('Berhasil memesan tiket')</script>";
        echo '<script>window.location.href = "../html/tiket.html";</script>';
    }else{
        echo "<script>alert('Gagal memesan tiket')</script>";
        echo '<script>window.location.href = "../html/tiket.html";</script>';
    }
}

if(isset($_POST['pesanFilmfastfurious'])){
    $jml = $_POST['jumlah'];
    $judul = "FastandFurious";

    $statement = $koneksi->prepare("insert into t_pesanan(judul,jumlah,username) values(?,?,?)");
    $statement->bind_param("sis",$judul,$jml,$username);
    $statement->execute();
    if($statement == true){
        echo "<script>alert('Berhasil memesan tiket')</script>";
        echo '<script>window.location.href = "../html/tiket.html";</script>';
    }else{
        echo "<script>alert('Gagal memesan tiket')</script>";
        echo '<script>window.location.href = "../html/tiket.html";</script>';
    }
}

if(isset($_POST['pesanFilmspiderman'])){
    $jml = $_POST['jumlah'];
    $judul = "SpidermanNoWayHome";

    $statement = $koneksi->prepare("insert into t_pesanan(judul,jumlah,username) values(?,?,?)");
    $statement->bind_param("sis",$judul,$jml,$username);
    $statement->execute();
    if($statement == true){
        echo "<script>alert('Berhasil memesan tiket')</script>";
        echo '<script>window.location.href = "../html/tiket.html";</script>';
    }else{
        echo "<script>alert('Gagal memesan tiket')</script>";
        echo '<script>window.location.href = "../html/tiket.html";</script>';
    }
}

if(isset($_POST['pesanFilmkkn'])){
    $jml = $_POST['jumlah'];
    $judul = "KKN Di Desa Penari";

    $statement = $koneksi->prepare("insert into t_pesanan(judul,jumlah,username) values(?,?,?)");
    $statement->bind_param("sis",$judul,$jml,$username);
    $statement->execute();
    if($statement == true){
        echo "<script>alert('Berhasil memesan tiket')</script>";
        echo '<script>window.location.href = "../html/tiket.html";</script>';
    }else{
        echo "<script>alert('Gagal memesan tiket')</script>";
        echo '<script>window.location.href = "../html/tiket.html";</script>';
    }
}

if(isset($_POST['pesanFilmmangkujiwo'])){
    $jml = $_POST['jumlah'];
    $judul = "Mangkujiwo";

    $statement = $koneksi->prepare("insert into t_pesanan(judul,jumlah,username) values(?,?,?)");
    $statement->bind_param("sis",$judul,$jml,$username);
    $statement->execute();
    if($statement == true){
        echo "<script>alert('Berhasil memesan tiket')</script>";
        echo '<script>window.location.href = "../html/tiket.html";</script>';
    }else{
        echo "<script>alert('Gagal memesan tiket')</script>";
        echo '<script>window.location.href = "../html/tiket.html";</script>';
    }
}

if(isset($_POST['pesanFilmstupidboss'])){
    $jml = $_POST['jumlah'];
    $judul = "MyStupidBoss";

    $statement = $koneksi->prepare("insert into t_pesanan(judul,jumlah,username) values(?,?,?)");
    $statement->bind_param("sis",$judul,$jml,$username);
    $statement->execute();
    if($statement == true){
        echo "<script>alert('Berhasil memesan tiket')</script>";
        echo '<script>window.location.href = "../html/tiket.html";</script>';
    }else{
        echo "<script>alert('Gagal memesan tiket')</script>";
        echo '<script>window.location.href = "../html/tiket.html";</script>';
    }
}
?>