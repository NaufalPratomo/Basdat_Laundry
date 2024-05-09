<?php 
    include "../service/database.php"; 

    session_start();
    $id_cus = $_SESSION['id_cus'];

    if (isset($_POST["add_item"])) {

        $nama_item = $_POST['nama_item'];
        $harga_satuan = $_POST['harga_satuan'];
        $jumlah_item = $_POST['jumlah_item'];

        $sql = "INSERT INTO item(id_cus, nama_item, harga, satuan) VALUES ('$id_cus', '$nama_item', '$harga_satuan', '$jumlah_item')";
        $db->query($sql);
    }

    
    if (isset($_POST["finish"])) {
        
        // menghitung total harga
        $total_harga = 0;
        $query = "SELECT harga, satuan FROM item";
        $result = $db->query($query);
        
        while ($row = mysqli_fetch_assoc($result)) {
            $harga = $row['harga'];
            $satuan = $row['satuan'];
            $total_harga += $row['harga'] * $row['satuan'];
        }

        $sql = "UPDATE customer_satuan SET harga = '$total_harga' WHERE id_cus = '$id_cus'";
        if ($db->query($sql)) {
            echo "mantap";
        } else {
            echo "gagal cooy";
        }
        header("Location: ../index.php");
    }

    function displayItemColumn() {
        // Connect to the database
        include "../service/database.php"; 
    
        $id_cus = $_SESSION['id_cus'];
    
        // Query to fetch and display item columns
        $query = "SELECT * FROM item WHERE id_cus = '$id_cus'";
        $result = $db->query($query);
    
        // Fetch all data first
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        // Output the table with all the data
        echo "<table class='table'>";
        echo "<thead><tr><th>Nama</th><th>Harga</th><th>Tanggal Keluar</th><th>Hapus</th></tr></thead>";
        echo "<tbody>";
        foreach ($data as $row) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['nama_item']) . "</td>";
            echo "<td>" . htmlspecialchars($row['harga']) . "</td>";
            echo "<td>" . htmlspecialchars($row['satuan']) . "</td>";
            echo "<td><form method='POST' action='tambah_item_satuan.php'>";
            echo "<input type='hidden' name='item_id' value='" . $row['id_item'] . "'>";
            echo "<button type='submit' name='remove_item'>Remove Item</button>";
            echo "</form></td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
    
    // Check if the form is submitted to remove an item
    if (isset($_POST["remove_item"])) {
        $item_id = $_POST['item_id'];
        removeItemColumn($item_id);
    }

    function removeItemColumn($item_id) {
        // Connect to the database
        include "../service/database.php"; 
    
        // Delete the item column based on item_id
        $sql = "DELETE FROM item WHERE id_item = '$item_id'";
        if ($db->query($sql)) {
            echo "Item column successfully removed.";
        } else {
            echo "Failed to remove item column.";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Item Satuan - Alesha Laundry</title>
    <!-- Bootstrap CSS untuk konsistensi dengan main menu -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Style inline untuk konsistensi dengan main menu -->
    <style>
        body {
            font-family: 'Arial', sans-serif; /* Font yang digunakan di main menu */
            background-color: #f8f9fa; /* Warna latar yang digunakan di main menu */
        }
        .form-tambah-item {
            max-width: 500px;
            margin: 30px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .form-tambah-item h3 {
            margin-bottom: 20px;
            color: #007bff; /* Warna yang digunakan di main menu */
        }
        .form-tambah-item input,
        .form-tambah-item button {
            margin-bottom: 10px;
            width: 100%;
            padding: 10px;
        }
        .form-tambah-item button {
            background-color: #007bff; /* Warna tombol yang digunakan di main menu */
            color: white;
        }
    </style>
</head>

<body>
    <?php include "../layout/header.html"; ?>
    <div class="form-tambah-item">
        <h3>Tambah Item Satuan</h3>
        <form action="tambah_item_satuan.php" method="POST" name="add_item">
            <input type="text" class="form-control" placeholder="Nama Item" name="nama_item">
            <input type="number" class="form-control" placeholder="Harga Satuan" name="harga_satuan">
            <input type="number" class="form-control" placeholder="Jumlah Item" name="jumlah_item">
            <button type="submit" class="btn btn-primary" name="add_item">Tambah Item</button>
            <button type="submit" class="btn btn-success" name="finish">Selesai</button>
        </form>
    </div>
    <?php 
    displayItemColumn();
    ?>

    <?php include "../layout/footer.html"; ?>
    <!-- Bootstrap JS untuk konsistensi dengan main menu -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
