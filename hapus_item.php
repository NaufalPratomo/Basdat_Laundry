<?php
// Buat koneksi ke database 
$mysqli = mysqli_connect("localhost", "root", "", "alesha_laundry_db");

// Cek koneksi
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Fungsi untuk menghapus data
function hapusData($id)
{
    global $mysqli;
    $id = $mysqli->real_escape_string($id); // Melindungi dari SQL injection
    $mysqli->query("DELETE FROM item WHERE id_cus = '$id'");
}
// Periksa apakah parameter diteruskan melalui URL
if (isset($_GET['id_cus'])) {
    // Tangkap nilai parameter dari URL
    $id_cus = $_GET['id_cus'];

    // Panggil fungsi untuk menghapus data berdasarkan id_cus dan tipe
    hapusData($id_cus);
} else {
    // Jika parameter tidak diteruskan, tangani kesalahan atau lakukan tindakan lain yang sesuai
    echo "Parameter tidak diteruskan.";
}
?>