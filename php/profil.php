<?php
include('koneksi.php');
session_start();

if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $statement =$koneksi->prepare("select * from pengguna where username = ?");
    $statement->bind_param("s",$username);
    $statement->execute();
    $result = $statement->get_result();
    $data = $result->fetch_assoc();
    $status = $data['pekerjaan'];

}else{
    header("Location: ../html/index.html");
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profil</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            
        }
        .profile {
            text-align: center;
            font-size: 35px;
            margin-top : 150px;
            margin-left:350px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            
        }

        .profile img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
           
        }

        .profile .details {
            font-size: 30px;
        }

        .profile .details p {
            margin: 10px 0;
        }
    
        @import url('https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500');
        *{
        padding: 0;
        margin: 0;
        list-style: none;
        text-decoration: none;
        }
        body {
        font-family: 'Roboto', sans-serif;
        }
        .sidebar {
        position: fixed;
        left: 0px;
        width: 250px;
        height: 100%;
        background: #042331;
        transition: all .5s ease;
        }
        .sidebar header {
        font-size: 22px;
        color: white;
        line-height: 70px;
        text-align: center;
        background: #063146;
        user-select: none;
        }
        .sidebar ul a{
        display: block;
        height: 100%;
        width: 100%;
        line-height: 65px;
        font-size: 20px;
        color: white;
        padding-left: 40px;
        box-sizing: border-box;
        border-bottom: 1px solid black;
        border-top: 1px solid rgba(255,255,255,.1);
        transition: .4s;
        }
        ul li:hover a{
        padding-left: 50px;
        }
        .sidebar ul a i{
        margin-right: 16px;
        }
        #check{
        display: none;
        }
        label #btn,label #cancel{
        position: absolute;
        background: #042331;
        border-radius: 3px;
        cursor: pointer;
        }
        label #btn{
        left: 250px;
        top: 25px;
        font-size: 35px;
        color: white;
        padding: 6px 12px;
        opacity: 0;
        pointer-events: none;
        transition: all .5s;
        }
        label #cancel{
        z-index: 1111;
        left: 195px;
        top: 17px;
        font-size: 30px;
        color: #0a5275;
        padding: 4px 9px;
        transition: all .5s ease;
        }
        #check:checked ~ .sidebar{
        left: -250px;
        }
        #check:checked ~ label #btn{
        left: 40px;
        opacity: 1;
        pointer-events: auto;
        }
        #check:checked ~ label #cancel{
        left: -195px;
        }
        #check:checked ~ section{
        margin-left: 0px;
        }
        section{
        background: url(../gambar/gambar4.jpg) no-repeat;
        background-position: center;
        background-size: cover;
        height: 100vh;
        transition: all .5s;
        margin-left: -250px;
        }

    </style>
</head>
<body>
    <input type="checkbox" id="check">
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
    <header>Bioskop</header>
  <ul>
    <li><a href="#"><i class="fas fa-link"></i>Profil</a></li>
    <li><a href="../html/tiket.html"><i class="fas fa-link"></i>Dashboard</a></li>
    <li><a href="../php/viewData.php"><i class="fas fa-stream"></i>Lihat Pesanan</a></li>
    <li><a href="../php/exit.php"><i class="fas fa-link"></i>Exit</a></li>
  </ul>
</div>
 <section>
 <div class="container">
    
        <div class="profile">
        <h1>Profil Saya</h1>
            <img src="../gambar/pp.jpg" alt="Foto Profil"> 
        <div class="details">
            <p><?php echo $username; ?></p>
            <p><?php echo $status; ?></p>
        </div>
 </section>

</body>
</html>