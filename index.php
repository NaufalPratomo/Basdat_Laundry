<?php
// Buat koneksi ke database
$mysqli = mysqli_connect("localhost", "root", "", "alesha_laundry_db");

// Cek koneksi
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Query untuk mengambil data pelanggan
$result = $mysqli->query("SELECT * FROM customer_reg");
$result2 = $mysqli->query("SELECT * FROM customer_satuan");
$result3 = $mysqli->query("SELECT * FROM customer_express");

// Fungsi untuk menampilkan data
function tampilkanData($result)
{
    echo "<table class='table'>";
    echo "<thead><tr><th>Nama</th><th>Nomor Telepon</th><th>Tanggal Masuk</th><th>Tanggal Keluar</th></tr></thead>";
    echo "<tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['nama_cus']) . "</td>";
        echo "<td>" . htmlspecialchars($row['noTelp_cus']) . "</td>";
        echo "<td>" . htmlspecialchars($row['tgl_masuk']) . "</td>";
        echo "<td>" . htmlspecialchars($row['tgl_keluar']) . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alesha Laundry</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Add Custom CSS -->
    <link rel="stylesheet" href="styles.css">
</head>

<body style="background-image: url('https://i0.wp.com/blog.dealpos.com/wp-content/uploads/2022/04/laundry-header.png?fit=1920%2C1080&ssl=1'); 
    background-size: cover; background-attachment: fixed; background-repeat: no-repeat;">
    <header class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="./image/logo.png" alt="" width="50px">
        <a class="navbar-brand" href="index.php">Alesha Laundry</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                </li>
            </ul>
        </div>
    </header>
    <main class="container mt-4">
        <div class="row">
            <!-- Tambah Reguler dengan ikon -->
            <div class="col-md-4"
                style="background: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <h2>Tambah Reguler</h2>
                <a class="btn btn-primary" href="tambah/tambah_reguler.php">
                    <i class="fa fa-plus-circle"></i> Tambah
                </a>
            </div>

            <!-- Tambah Express dengan ikon -->
            <div class="col-md-4"
                style="background: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <h2>Tambah Express</h2>
                <a class="btn btn-primary" href="tambah/tambah_express.php">
                    <i class="fa fa-plus-circle"></i> Tambah
                </a>
            </div>

            <!-- Tambah Satuan dengan ikon -->
            <div class="col-md-4"
                style="background: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <h2>Tambah Satuan</h2>
                <a class="btn btn-primary" href="tambah/tambah_satuan.php">
                    <i class="fa fa-plus-circle"></i> Tambah
                </a>
            </div>
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        </div>
        <!-- Bagian untuk menampilkan data -->
        <div
            style="background: rgba(255, 255, 255, 0.8); padding: 20px; margin-top: 50px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <h2>Data Pelanggan</h2>
            <br>
            <?php
            echo "<h3>Reguler</h3>";
            tampilkanData($result);
            echo "<h3>Express</h3>";
            tampilkanData($result3);
            echo "<h3>Satuan</h3>";
            tampilkanData($result2);
            ?>
        </div>
    </main>
    <?php include "layout/footer.html"; ?>
    <!-- Add jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Add Custom JS -->
    <script src="scripts.js"></script>
</body>

</html>