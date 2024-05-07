<?php 
    include "../service/database.php";
    include "tambah_satuan.php";

    if (isset($_POST['tambah'])) {

        $nama_ex = $_POST['nama_ex'];
        $noTelp_ex = $_POST['noTelp_ex'];
        $keterangan = $_POST['keterangan'];
        $tgl_masuk = $_POST['tgl_masuk'];
        $tgl_keluar = $_POST['tgl_keluar'];

        while ($row = mysqli_fetch_assoc($result)) {
            $harga = $row['harga'];
            $satuan = $row['satuan'];
            $total_harga += $row['harga'] * $row['satuan'];
        }
        // memasukkan data ke customer_satuan
        $sql = "INSERT INTO customer_satuan(nama_cus, noTelp_cus, harga, keterangan, tgl_keluar, 'tgl_masuk') VALUES ('$nama_ex', '$noTelp_ex', '$total_harga','$keterangan', '$tgl_keluar', DEFAULT)";
        
        if ($db->query($sql)) {
            $id_cus = mysqli_insert_id($db);
            echo "mantap bwang";
        } else {
            echo "gagal";
        }

        mysqli_close($db);
    }

    if (isset($_POST["tambah_item"])) {
        $db = mysqli_connect($hostname, $username, $password, $database);
        $nama_item = $_POST['nama_item'];
        $harga_satuan = $_POST['harga_satuan'];
        $Jumlah_item = $_POST['Jumlah_item'];

        $sql = "INSERT INTO item(nama_item, harga, satuan) VALUES ('$nama_item', '$harga_satuan', '$Jumlah_item')";

        if ($db->query($sql)) {
            echo "Noice";
        } else {
            echo "gagal";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alesha Laundry</title>
</head>
<body>
    <?php include "../layout/header.html"; ?>
    <h3>Tambah Satuan</h3>
    <form action="tambah_satuan.php" method="POST" nama='tambah_satuan'>
        <input type="text" placeholder="nama" name="nama_ex">
        <input type="text" placeholder="nomor telepon" name="noTelp_ex">
        <input type="text" placeholder="keterangan" name="keterangan">
        <p>tanggal keluar</p>
        <input type="date" placeholder="tanggal keluar" name="tgl_keluar">
        <p></p>
        
        <button type="submit" name="tambah">Selesai</button>
        
        <h3>Tambah Item</h3>
    </form>

    <?php include "../layout/footer.html"; ?>
</body>
</html>