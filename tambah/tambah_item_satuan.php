<?php 
    include "../service/database.php";
    
    if (isset($_POST["tambah_item"])) {
        $nama_item = $_POST['nama_item'];
        $harga_satuan = $_POST['harga_satuan'];
        $Jumlah_item = $_POST['Jumlah_item'];

        $sql = "INSERT INTO item(id_cus, nama_item, harga, satuan) VALUES ('$id_cus', '$nama_item', '$harga_satuan', '$Jumlah_item')";

        if ($db->query($sql)) {
            echo "Noice, ditambahkan";
        } else {
            echo "gagal";
        }
    }

    // menghitung total harga
    $query = "SELECT harga, satuan FROM item";
    $result = $db->query($query);
    $total_harga = 0;

    if (isset($_POST["finish"])) {

        while ($row = mysqli_fetch_assoc($result)) {
            $harga = $row['harga'];
            $satuan = $row['satuan'];
            $total_harga += $row['harga'] * $row['satuan'];
        }
        $sql = "INSERT INTO customer_satuan(harga_total) VALUES ('$total_harga')";
        $db->query($sql);
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
    <h3>Tambah Item Satuan</h3>
    
    <form action="tambah_satuan.php" method="POST" name="add_item">
        <input type="text" placeholder="nama item" name="nama_item">
        <input type="number" placeholder="Harga Satuan" name="harga_satuan">
        <input type="number" placeholder="Jumlah Item" name="Jumlah Item">
        <button type="submit" name="add_item">Tambah Item</button>
        <button type="submit" name="finish" formaction="../index.php">Selesai</button>
    </form>

    <?php include "../layout/footer.html"; ?>
</body>
</html>