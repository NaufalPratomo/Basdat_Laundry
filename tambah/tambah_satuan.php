<?php 
    include "../service/database.php"; 

    if (isset($_POST['tambah'])) {
        $db = mysqli_connect($hostname, $username, $password, $database);

        $nama_cus = $_POST['nama_cus'];
        $noTelp_cus = $_POST['noTelp_cus'];
        $keterangan = $_POST['keterangan'];
        $tgl_keluar = $_POST['tgl_keluar'];

        // memasukkan data ke customer_satuan
        $sql = "INSERT INTO customer_satuan(nama_cus, noTelp_cus, keterangan, tgl_keluar, tgl_masuk) VALUES ('$nama_cus', '$noTelp_cus', '$keterangan', '$tgl_keluar', DEFAULT)";
        $db->query($sql);
        $temp = mysqli_insert_id($db);
        session_start();
        $_SESSION['id_cus'] = $temp;

        header("Location: tambah_item_satuan.php");
        exit();
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Satuan - Alesha Laundry</title>
    <!-- Bootstrap CSS untuk konsistensi dengan main menu -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Style inline untuk konsistensi dengan main menu -->
    <style>
        body {
            font-family: 'Arial', sans-serif; /* Font yang digunakan di main menu */
            background-color: #f8f9fa; /* Warna latar yang digunakan di main menu */
        }
        .form-tambah-satuan {
            max-width: 500px;
            margin: 30px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .form-tambah-satuan h3 {
            margin-bottom: 20px;
            color: #007bff; /* Warna yang digunakan di main menu */
        }
        .form-tambah-satuan input,
        .form-tambah-satuan button {
            margin-bottom: 10px;
            width: 100%;
            padding: 10px;
        }
        .form-tambah-satuan button {
            background-color: #007bff; /* Warna tombol yang digunakan di main menu */
            color: white;
        }
    </style>
</head>
<body>
    <?php include "../layout/header.html"; ?>
    <div class="form-tambah-satuan">
        <h3>Tambah Satuan</h3>
        <form action="tambah_satuan.php" method="POST" name='tambah_satuan'>
            <input type="text" class="form-control" placeholder="Nama" name="nama_cus">
            <input type="text" class="form-control" placeholder="Nomor Telepon" name="noTelp_cus">
            <input type="text" class="form-control" placeholder="Keterangan" name="keterangan">
            <label for="tgl_keluar">Tanggal Keluar:</label>
            <input type="date" class="form-control" name="tgl_keluar">
            <button type="submit" class="btn btn-primary" name="tambah">Input Item</button>
        </form>
    </div>

    <?php include "../layout/footer.html"; ?>
    <!-- Bootstrap JS untuk konsistensi dengan main menu -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
