<?php 
    include "../service/database.php";
    if (isset($_POST['tambah'])) {

        $nama_reg = $_POST['nama_reg'];
        $noTelp_reg = $_POST['noTelp_reg'];
        $berat = $_POST['berat'];
        $keterangan = $_POST['keterangan'];
        $tgl_keluar = $_POST['tgl_keluar'];
        $garansi = new DateTime($tgl_keluar);
        $garansi->add(new DateInterval('P3D'));
        $garansi = $garansi->format('Y-m-d');
        $harga = $berat * 5000;

        $sql = "INSERT INTO customer_reg (nama_cus, noTelp_cus, berat, harga, keterangan, tgl_keluar, garansi) VALUES ('$nama_reg', '$noTelp_reg', '$harga','$berat', '$keterangan', '$tgl_keluar', '$garansi')";
        
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
    <h3>Tambah Reguler</h3>
    <form action="tambah_reguler.php" method="POST">
        <input type="text" placeholder="nama" name="nama_reg">
        <input type="text" placeholder="nomor telepon" name="noTelp_reg">
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