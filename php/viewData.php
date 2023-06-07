<?php
    include('koneksi.php');
    session_start();

    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
    }else{
        header("Location: ../html/index.html");
    }

    
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Pemesanan</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        table {
            width: 50%;
            /* display: flex; */
            margin-left: auto;
            margin-right: 190px;
            /* margin-top:50px; */
            align-items: center;
            justify-content: center;
            /* height: 100vh;  */
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color:  #0a5275;
        }

        tr:nth-child(even) {
            background-color:white;
        }

        tr:hover {
            background-color: #6aa6c2;
        }

        a {
            text-decoration: none;
            color: #000;
        }

        a:hover {
            color:blue;
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
        background: url(../gambar/gambar3.jpg) no-repeat;
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
            <li><a href="../php/profil.php"><i class="fas fa-link"></i>Profil</a></li>
            <li><a href="../html/tiket.html"><i class="fas fa-link"></i>Dashboard</a></li>
            <li><a href="#"><i class="fas fa-stream"></i>Lihat Pesanan</a></li>
            <li><a href="../php/exit.php"><i class="fas fa-link"></i>Exit</a></li>
        </ul>
    </div>
    
    <section>
    <table border="1px">
        <tr>
            <th>No Pesanan</th>
            <th>Judul Film</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
            <th>Action</th>
        
            <?php
            $statement =$koneksi->prepare("select * from t_pesanan where username = ?");
            $statement->bind_param("s",$username);
            $statement->execute();
            $result = $statement->get_result();

            if(!$result){
                die("Query Error: ".mysqli_errno($koneksi).
                " - ".mysqli_error($koneksi));
            }

            while($data = $result->fetch_assoc()){
                $judul = $data['judul'];
                $query = "select * from t_film where judul = '$judul'";
                $hasil = mysqli_query($koneksi,$query);
                $dataHarga = mysqli_fetch_assoc($hasil);
                $hasil->free();
                $harga = $dataHarga['harga'];
                $hargaTotal = $data['jumlah'] * $harga;
                echo "<tr>";
                echo "<td>$data[id_pesanan]</td>"; 
                echo "<td>$data[judul]</td>";
                echo "<td>$data[jumlah]</td>";
                echo "<td>$hargaTotal </td>";
                // membuat koneksi untuk mengedit dan menghapus data
                echo '<td>
                <a href="editData.php?id_pesanan='.$data['id_pesanan'].'">Edit</a>
                <a href="hapusData.php?id_pesanan='.$data['id_pesanan'].'"
                    onclick="return confirm(\'Anda yakin akan menghapus data?\')">Hapus</a>
                </td>';
                echo "</tr>";
            }
            ?>   
        </tr>
    </table>
    </section>

</body>
</html>