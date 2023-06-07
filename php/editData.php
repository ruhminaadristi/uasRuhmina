<?php
    include('koneksi.php');
    session_start();

    if(isset($_GET['id_pesanan'])){
        $id_pesanan = $_GET['id_pesanan'];

        $statement = $koneksi->prepare("select * from t_pesanan where id_pesanan = ?");
        $statement->bind_param("i",$id_pesanan);
        $statement->execute();
        $result = $statement->get_result();

        if(!$result){
            die("Query Error: ".mysqli_errno($koneksi).
            " - ".mysqli_error($koneksi));
        }
        $data = $result->fetch_assoc();
        $judul = $data['judul'];
        $jumlah = $data['jumlah'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Create</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url(../gambar/g2.jpg);
            background-size: cover;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            padding: 20px;
            width: 500px;
            height: 400px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"],
        button {
            padding: 10px 20px;
            background-color: #0f5e86;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 100px;
            margin-left:115px
        }

        input[type="submit"]:hover,
        button:hover {
            background-color: #0f5e86;
            
        }

        button[type="reset"] {
            margin-left: 10px;
            background-color:grey;
            margin-top: 100px;
            margin-left:100px
        }

        button[type="reset"]:hover {
            background-color:grey;
        }
    </style>
</head>
<body>
    <form method="POST" action="prosesEditData.php">
    <h2>Edit Pemesanan</h2>
        <label for="id">Nomor Pesanan :</label>
        <input type="hidden" name="id" value="<?php echo $id_pesanan;?>">
        <input type="text" name="id" id="id" value="<?php echo $id_pesanan ?>" disabled><br>

        <label for="judul">Judul :</label>
        <input type="hidden" name="judul" value="<?php echo $judul;?>">
        <input type="text" name="judul" id="judul" value="<?php echo $judul ?>" disabled><br>

        <label for="jumlah">Jumlah:</label>
        <input type="number" name="jumlah" value="<?php echo $jumlah ?>"><br>

        <input type="submit" name="update" value="Update">
        <button type="reset">Reset</button>
    </form>
</body>
</html>