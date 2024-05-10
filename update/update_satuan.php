<?php 
    // Buat koneksi ke database 
    $mysqli = new mysqli("localhost", "root", "", "alesha_laundry_db");

    // Cek koneksi
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $id_cus = null;

    if (isset($_GET['id_cus'])) {
        $id_cus = $_GET['id_cus'];
    } else {
        die("Invalid request");
    }

    if (isset($_POST['update'])) {
        $nama_cus = $_POST['nama_cus'];
        $noTelp_cus = $_POST['noTelp_cus'];
        $keterangan = $_POST['keterangan'];
        $tgl_keluar = $_POST['tgl_keluar'];
        $tgl_masuk = $_POST['tgl_masuk'];

        // Input validation
        if (empty($nama_cus) || empty($noTelp_cus) || empty($tgl_keluar) || empty($tgl_masuk)) {
            die("All fields are required.");
        }

        $sql = "UPDATE customer_satuan
            SET nama_cus = ?, noTelp_cus = ?, keterangan = ?, tgl_keluar = ?
            WHERE id_cus = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ssssi", $nama_cus, $noTelp_cus, $keterangan, $tgl_keluar, $id_cus);

        if ($stmt->execute()) {
            echo "Update successful.";
        } else {
            echo "Error: " . $mysqli->error;
        }

        $stmt->close();
        header("Location: ../index.php"); // Redirect to index.php
        exit(); // Ensure that no other content is sent
    }

// Update With Item Button
if (isset($_POST['update_item'])) {
    session_start();
    $id_cus = $_SESSION['id_cus']; // Transfer $id_cus using session
    header("Location: ../tambah/tambah_item_satuan.php?id_cus=$id_cus"); // Redirect to tambah_item_satuan.php
    exit(); // Ensure that no other content is sent
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Satuan - Alesha Laundry</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Custom styles for this template -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            padding-top: 20px;
        }
        .form-update-satuan {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .form-update-satuan h1 {
            color: #007bff;
            margin-bottom: 20px;
        }
        .form-update-satuan input,
        .form-update-satuan button {
            margin-bottom: 10px;
            width: 100%;
            padding: 10px;
        }
        .form-update-satuan button {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <?php include "../layout/header.html"; ?>
    <div class="container">
        <div class="form-update-satuan">
            <h1>Update Satuan</h1>
            <form action="update_satuan.php?id_cus=<?php echo $id_cus; ?>" method="POST">
                <input type="text" class="form-control" placeholder="Nama" name="nama_cus">
                <input type="text" class="form-control" placeholder="Nomor Telepon" name="noTelp_cus">
                <input type="text" class="form-control" placeholder="Keterangan" name="keterangan">
                <label for="tgl_keluar">Tanggal Keluar:</label>
                <input type="date" class="form-control" name="tgl_keluar">
                <label for="tgl_masuk">Tanggal Masuk:</label>
                <input type="date" class="form-control" name="tgl_masuk">
                <button type="submit" class="btn btn-primary" name="update">Update Data Only</button>
                <button type="submit" class="btn btn-primary" name="update_item">Update The Item</button>
            </form>
        </div>
    </div>
    <?php include "../layout/footer.html"; ?>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
