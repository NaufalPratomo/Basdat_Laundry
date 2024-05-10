<?php
// Buat koneksi ke database 
$mysqli = mysqli_connect("localhost", "root", "", "alesha_laundry_db");

// Cek koneksi
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Fungsi untuk menghapus data
function hapusData($id, $tipe)
{
    global $mysqli;
    $id = $mysqli->real_escape_string($id); // Melindungi dari SQL injection
    if ($tipe == "reguler") {
        $mysqli->query("DELETE FROM customer_reg WHERE id_cus = '$id'");
    }
    if ($tipe == "express") {
        $mysqli->query("DELETE FROM customer_express WHERE id_cus = '$id'");
    }
    if ($tipe == "satuan") {
        $mysqli->query("DELETE FROM item WHERE id_cus = '$id'");
        $mysqli->query("DELETE FROM customer_satuan WHERE id_cus = '$id'");
    }
    echo "<script>window.location.reload();</script>";
}
// Periksa apakah parameter diteruskan melalui URL
if (isset($_GET['id_cus'], $_GET['tipe'])) {
    // Tangkap nilai parameter dari URL
    $id_cus = $_GET['id_cus'];
    $tipe = $_GET['tipe'];

    // Panggil fungsi untuk menghapus data berdasarkan id_cus dan tipe
    hapusData($id_cus, $tipe);

    // Redirect kembali ke halaman lain atau lakukan tindakan lain setelah penghapusan data
    header('Location: index.php'); // Mengarahkan kembali ke halaman utama
    exit(); // Penting untuk menghentikan eksekusi skrip setelah mengarahkan
} else {
    // Jika parameter tidak diteruskan, tangani kesalahan atau lakukan tindakan lain yang sesuai
    echo "Parameter tidak diteruskan.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alesha Laundry - Delete Data</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <?php
        // Kode PHP Anda di sini
        ?>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
