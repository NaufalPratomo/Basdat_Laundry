<?php 
    include "../service/database.php"; 

    if (isset($_GET['id_cus'])) {   
        $id_cus = $_GET['id_cus'];
        // echo "$id_cus";
    }

    if (isset($_POST['done'])) {
        echo "DONE";
    }
    
    // Code for displaying data in table
    $query = "SELECT * FROM customer_reg WHERE id_cus = '$id_cus'";
    $result = mysqli_query($db, $query);
    
    // if (mysqli_num_rows($result) > 0) {
    //     echo "<table border='1' style='border-collapse: collapse;'>";
    //     echo "<tr><th>ID</th><th>Name</th><th>No Telp</th><th>Tanggal Masuk</th><th>Tanggal Keluar</th><th>Harga</th><th>Berat</th><th>Keterangan</th></tr>";
    //     while ($row = mysqli_fetch_assoc($result)) {
    //         echo "<tr>";
    //         echo "<td>" . $row['id_cus'] . "</td>";
    //         echo "<td>" . $row['nama_cus'] . "</td>";
    //         echo "<td>" . $row['noTelp_cus'] . "</td>";
    //         echo "<td>" . $row['tgl_masuk'] . "</td>";
    //         echo "<td>" . $row['tgl_keluar'] . "</td>";
    //         echo "<td>" . $row['harga'] . "</td>";
    //         echo "<td>" . $row['berat'] . "</td>";
    //         echo "<td>" . $row['keterangan'] . "</td>";
    //         echo "</tr>";
    //     }
    //     echo "</table>";
    // } else {
    //     echo "No results found.";
    // }
    
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Reguler - Alesha Laundry</title>
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
        <h3 class="mb-4">Detail Reguler</h3>
        <div class="table-responsive">
            <?php 
            // PHP code to display the table
            if (mysqli_num_rows($result) > 0) {
                echo "<table class='table table-striped table-hover'>";
                echo "<thead><tr><th>ID</th><th>Name</th><th>No Telp</th><th>Tanggal Masuk</th><th>Tanggal Keluar</th><th>Harga</th><th>Berat</th><th>Keterangan</th></tr></thead>";
                echo "<tbody>";
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
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<p>No results found.</p>";
            }
            ?>
        </div>
        <form action="detail_reguler.php" method="POST" name="detail">
            <a href="../update/update_reguler.php?id_cus=<?php echo $id_cus; ?>" class="btn btn-primary btn-custom">Update</a>
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
