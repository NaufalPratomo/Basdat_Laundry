<?php 
$mysqli = mysqli_connect("localhost", "root", "", "alesha_laundry_db");

// Cek koneksi
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (isset($_GET['id_cus'])) {   
    $id_cus = $_GET['id_cus'];
}

if (isset($_POST['done'])) {
    echo "DONE";
}

// Code for displaying customer data in table
$query_customer = "SELECT * FROM customer_satuan WHERE id_cus = '$id_cus'";
$result_customer = mysqli_query($mysqli, $query_customer);

// Code for displaying item data in table
$query_item = "SELECT * FROM item WHERE id_cus = '$id_cus'";
$result_item = mysqli_query($mysqli, $query_item);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Satuan - Alesha Laundry</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Custom styles for this template -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            padding-top: 20px;
        }

        .table-responsive {
            margin-top: 20px;
        }

        .btn-custom {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <?php include "../layout/header.html"; ?>
    <div class="container">
        <h2 class="mb-4 text-center">Alesha Laundry</h2>
        <h3 class="mb-4">Detail Satuan</h3>
        <div class="table-responsive">
            <?php
            // PHP code to display the customer table
            if ($result_customer && mysqli_num_rows($result_customer) > 0) {
                echo "<table class='table table-striped table-hover'>";
                echo "<thead><tr><th>ID</th><th>Name</th><th>No Telp</th><th>Tanggal Masuk</th><th>Tanggal Keluar</th><th>Harga</th><th>Keterangan</th><th>Nama Item</th></tr></thead>"; // Removed <th>Jumlah</th>
                echo "<tbody>";
                while ($row_customer = mysqli_fetch_assoc($result_customer)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row_customer['id_cus']) . "</td>";
                    echo "<td>" . htmlspecialchars($row_customer['nama_cus']) . "</td>";
                    echo "<td>" . htmlspecialchars($row_customer['noTelp_cus']) . "</td>";
                    echo "<td>" . htmlspecialchars($row_customer['tgl_masuk']) . "</td>";
                    echo "<td>" . htmlspecialchars($row_customer['tgl_keluar']) . "</td>";
                    echo "<td>" . htmlspecialchars($row_customer['harga']) . "</td>";
                    echo "<td>" . htmlspecialchars($row_customer['keterangan']) . "</td>";

                    // Reset item result pointer before fetching item details
                    mysqli_data_seek($result_item, 0);
                    $item_found = false;
                    while ($row_item = mysqli_fetch_assoc($result_item)) {
                        if ($row_item['id_cus'] == $row_customer['id_cus']) {
                            echo "<td>" . htmlspecialchars($row_item['nama_item']) . "</td>";
                            $item_found = true;
                            break; // Break the loop if item is found
                        }
                    }
                    if (!$item_found) {
                        echo "<td>N/A</td>";
                    }
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<p>No customer results found.</p>";
            }
            ?>
        </div>
        <form action="detail_satuan.php" method="POST" name="detail">
    <a href="../update/update_satuan.php?id_cus=<?php echo $id_cus; ?>" class="btn btn-primary btn-custom">Update</a>
    <a href="../index.php" class="btn btn-success btn-custom">Done</a>
</form>
    </div>
    <?php include "../layout/footer.html"; ?>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>