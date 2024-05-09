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
    
    // ----------------- INI KODE BUAT NAMPILIN DATA BANG -----------------------

    $query = "SELECT * FROM customer_satuan WHERE id_cus = '$id_cus'";
    $result = $mysqli->query($query);
    // dsb
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