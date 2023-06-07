<?php
include('koneksi.php');
session_start();

session_destroy();
echo "<script>alert('Anda akan keluar sesi')</script>";
echo '<script>window.location.href = "../html/index.html";</script>';
?>