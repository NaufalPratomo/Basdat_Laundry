<?php
    $mysqli = mysqli_connect("localhost", "root", "", "alesha_laundry_db");

    // Cek koneksi
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    if (isset($_GET['id_cus'], $_GET['tipe'])) {
        $id_cus = $_GET['id_cus'];
        $tipe = $_GET['tipe'];
    } else {
        echo "GAGAAAL";
    }

    global $mysqli;
    $mysqli = mysqli_connect("localhost", "root", "", "alesha_laundry_db");

    if ($tipe == 'reguler') {
        echo "REEEEGGG";
        $query = "SELECT * FROM customer_reg WHERE id_cus = '$id_cus'";
        $result = $mysqli->query($query);
    } elseif ($tipe == 'express') {
        echo "EXPREEEEESSS";
        $query = "SELECT * FROM customer_express WHERE id_cus = '$id_cus'";
        $result = $mysqli->query($query);
    } elseif ($tipe == 'satuan') {
        echo "SATUAAAAAAAN";
        $query = "SELECT * FROM customer_satuan WHERE id_cus = '$id_cus'";
        $result = $mysqli->query($query);
    }

    if ($tipe == 'satuan') {
        while ($row = $result->fetch_assoc()) {
            $nama = $row['nama_cus'];
            $noTelp = $row['noTelp_cus'];
            $harga_total = $row['harga'];
            $tgl_masuk = $row['tgl_masuk'];
            $tgl_keluar = $row['tgl_keluar'];
            $tgl_selesai = $row['tgl_selesai'];
            $keterangan = $row['keterangan'];
            $garansi = $row['garansi'];
        }

        echo  $nama ;
        echo "              ";
        echo  $noTelp . "               ";
        echo "              ";
        echo  $harga_total;
        echo "              ";
        echo  $tgl_masuk ;
        echo "              ";
        echo  $tgl_keluar;
        echo "              ";
        echo  $tgl_selesai ;
        echo "              ";
        echo  $keterangan ;
        echo "              ";
        echo  $garansi ;

        $query = "SELECT * FROM item WHERE id_cus = '$id_cus'";
        $result = $mysqli->query($query);

        while ($row = $result->fetch_assoc()) {
            $id_item = $row['id_item'];
            $nama_item = $row['nama_item'];
            $harga_satuan = $row['harga'];
            $jumlah = $row['satuan'];
        }

        echo "<table class='table'>";
        echo "<thead><tr><th>Item</th><th>Harga Satuan</th><th>Jumlah</th></tr></thead>";
        echo "<tbody>";
        echo "<tr>";
        echo "<td>" . htmlspecialchars($nama_item) . "</td>";
        echo "<td>" . htmlspecialchars($harga_satuan) . "</td>";
        echo "<td>" . htmlspecialchars($jumlah) . "</td>";
        echo "</tr>";
        echo "</tbody>";
        echo "</table>";
    } else {
        while ($row = $result->fetch_assoc()) {
            $nama = $row['nama_cus'];
            $noTelp = $row['noTelp_cus'];
            $harga_total = $row['harga'];
            $tgl_masuk = $row['tgl_masuk'];
            $tgl_keluar = $row['tgl_keluar'];
            $tgl_selesai = $row['tgl_selesai'];
            $keterangan = $row['keterangan'];
            $garansi = $row['garansi'];
        }

        echo  $nama ;
        echo "              ";
        echo  $noTelp;
        echo "              ";
        echo  $harga_total;
        echo "              ";
        echo  $tgl_masuk ;
        echo "              ";
        echo  $tgl_keluar;
        echo "              ";
        echo  $tgl_selesai ;
        echo "              ";
        echo  $keterangan ;
        echo "              ";
        echo  $garansi ;
    }

    // untuk button update
    if (isset($_POST["update_button"])) {
        if ($tipe == 'reguler') {
            header("Location: update_express.php");
            exit();
        } elseif ($tipe == 'express') {
            header("Location: update_express.php");
            exit();
        } elseif ($tipe == 'satuan') {
            header("Location: update_express.php");
            exit();
        }
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
</head>
<body>

<form action="detail.php" method="POST">
    <button type="submit" name="update_button">Update</button>

    <button type="submit" name="job_done_button">Job Done</button>
</form>

</body>
</html>