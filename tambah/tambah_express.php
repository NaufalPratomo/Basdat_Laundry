<?php 
    include "../service/database.php"; 
    if (isset($_POST['tambah'])) {
        $db = mysqli_connect($hostname, $username, $password, $database);

        $nama_ex = $_POST['nama_ex'];
        $noTelp_ex = $_POST['noTelp_ex'];
        $berat = $_POST['berat'];
        $keterangan = $_POST['keterangan'];
        $tgl_keluar = $_POST['tgl_keluar'];

        $harga = $berat * 10000;

        $sql = "INSERT INTO customer_express(nama_cus, noTelp_cus, berat, harga, keterangan, tgl_keluar, tgl_masuk) VALUES ('$nama_ex', '$noTelp_ex', '$berat', '$harga','$keterangan', '$tgl_keluar', DEFAULT)";
        
        if ($db->query($sql)) {
            echo "mantap bwang";
        } else {
            echo "gagal";
        }
        
        mysqli_close($db);
        header("Location: ../index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Express - Alesha Laundry</title>
    <!-- Bootstrap CSS untuk konsistensi dengan main menu -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Style inline untuk konsistensi dengan main menu -->
    <style>
        body {
            font-family: 'Arial', sans-serif; /* Font yang digunakan di main menu */
            background-color: #f8f9fa; /* Warna latar yang digunakan di main menu */
        }
        .form-tambah-express {
            max-width: 500px;
            margin: 30px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .form-tambah-express h3 {
            margin-bottom: 20px;
            color: #007bff; /* Warna yang digunakan di main menu */
        }
        .form-tambah-express input,
        .form-tambah-express button {
            margin-bottom: 10px;
            width: 100%;
            padding: 10px;
        }
        .form-tambah-express button {
            background-color: #007bff; /* Warna tombol yang digunakan di main menu */
            color: white;
        }
    </style>
</head>
<body>
    <?php include "../layout/header.html"; ?>
    <div class="form-tambah-express">
        <h3>Tambah Express</h3>
        <form action="tambah_express.php" method="POST">
            <input type="text" class="form-control" placeholder="Nama" name="nama_ex">
            <input type="text" class="form-control" placeholder="Nomor Telepon" name="noTelp_ex">
            <input type="number" class="form-control" placeholder="Berat (Kg)" name="berat">
            <input type="text" class="form-control" placeholder="Keterangan" name="keterangan">
            <label for="tgl_keluar">Tanggal Keluar:</label>
            <input type="date" class="form-control" name="tgl_keluar">
            <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
        </form>
    </div>
    <?php include "../layout/footer.html"; ?>
    <!-- Bootstrap JS untuk konsistensi dengan main menu -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
