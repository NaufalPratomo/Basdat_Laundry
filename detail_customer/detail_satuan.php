<?php 
    $mysqli = mysqli_connect("localhost", "root", "", "alesha_laundry_db");

    // Cek koneksi
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    if (isset($_GET['id_cus'])) {   
        $id_cus = $_GET['id_cus'];
        echo "$id_cus";
    }

    if (isset($_POST['done'])) {
        echo "DONE";
    }
    
    // Code for displaying data in table
    $query = "SELECT * FROM customer_satuan WHERE id_cus = '$id_cus'";
    $result = mysqli_query($mysqli, $query);
    
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1' style='border-collapse: collapse;'>";
        echo "<tr><th>ID</th><th>Name</th><th>No Telp</th><th>Tanggal Masuk</th><th>Tanggal Keluar</th><th>Harga</th><th>Keterangan</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id_cus'] . "</td>";
            echo "<td>" . $row['nama_cus'] . "</td>";
            echo "<td>" . $row['noTelp_cus'] . "</td>";
            echo "<td>" . $row['tgl_masuk'] . "</td>";
            echo "<td>" . $row['tgl_keluar'] . "</td>";
            echo "<td>" . $row['harga'] . "</td>";
            echo "<td>" . $row['keterangan'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No results found.";
    }

        // Code for displaying data in table
        $query = "SELECT * FROM item WHERE id_cus = '$id_cus'";
        $result = mysqli_query($mysqli, $query);
        
        if (mysqli_num_rows($result) > 0) {
            echo "<table border='1' style='border-collapse: collapse;'>";
            echo "<tr><th>Nama</th><th>Harga/pcs</th><th>jumlah</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['nama_item'] . "</td>";
                echo "<td>" . $row['harga'] . "</td>";
                echo "<td>" . $row['satuan'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No results found.";
        }
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="detail_satuan.php" method="POST" name="detail">
    <a href="../update/update_satuan.php?id_cus=<?php echo $id_cus; ?>">Update</a>

    </form>
</body>
</html>