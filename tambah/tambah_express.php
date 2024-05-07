<?php 
    include "../service/database.php";
    if (isset($_POST['tambah'])) {
        $nama_ex = $_POST['nama_ex'];
        $noTelp_ex = $_POST['noTelp_ex'];
        $berat = $_POST['berat'];
        $keterangan = $_POST['keterangan'];
        $tgl_masuk = $_POST['tgl_masuk'];
        $tgl_keluar = $_POST['tgl_keluar'];

        $harga = $berat * 10000;

        $sql = "INSERT INTO customer_express(nama_cus, noTelp_cus, berat, harga, keterangan, tgl_keluar, tgl_masuk) VALUES ('$nama_ex', '$noTelp_ex', '$harga','$berat', '$keterangan', '$tgl_keluar', DEFAULT)";
        
        if ($db->query($sql)) {
            echo "mantap bwang";
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
    <h3>Tambah Express</h3>
    <form action="tambah_express.php" method="POST">
        <input type="text" placeholder="nama" name="nama_ex">
        <input type="text" placeholder="nomor telepon" name="noTelp_ex">
        <input type="number" placeholder="berat" name="berat">
        <input type="text" placeholder="keterangan" name="keterangan">
        <p>tanggal keluar</p>
        <input type="date" placeholder="tanggal keluar" name="tgl_keluar">
        <p></p>

        <button type="submit" name="tambah">tambah</button>
    </form>
    <?php include "../layout/footer.html"; ?>
</body>
</html>