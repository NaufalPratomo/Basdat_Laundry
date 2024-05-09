<?php 
    include "../service/database.php"; 

    if (isset($_GET['id_cus'])) {   
        $id_cus = $_GET['id_cus'];
        echo "$id_cus";
    }

    if (isset($_POST['done'])) {
        echo "DONE";
    }
    
    // Code for displaying data in table
    $query = "SELECT * FROM customer_reg WHERE id_cus = '$id_cus'";
    $result = mysqli_query($db, $query);
    
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1' style='border-collapse: collapse;'>";
        echo "<tr><th>ID</th><th>Name</th><th>No Telp</th><th>Tanggal Masuk</th><th>Tanggal Keluar</th><th>Harga</th><th>Berat</th><th>Keterangan</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id_cus'] . "</td>";
            echo "<td>" . $row['nama_cus'] . "</td>";
            echo "<td>" . $row['noTelp_cus'] . "</td>";
            echo "<td>" . $row['tgl_masuk'] . "</td>";
            echo "<td>" . $row['tgl_keluar'] . "</td>";
            echo "<td>" . $row['harga'] . "</td>";
            echo "<td>" . $row['berat'] . "</td>";
            echo "<td>" . $row['keterangan'] . "</td>";
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
<form action="detail_reguler.php" method="POST" name="detail">
    <a href="../update/update_reguler.php?id_cus=<?php echo $id_cus; ?>">Update</a>

    </form>
</body>
</html>