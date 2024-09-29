<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESEP</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #FFFFFF;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-container {
            background-color: #FFFFFF;
            padding: 20px;
            border-radius: 30px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.9);
        }
        
        input[type="text"], input[type="number"], input[type="number"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #A9A9A9;
            border-radius: 4px;
        }
        input[type="submit"], button {
            background-color: #F0F0F0;
            color: #000000;
            padding: 10px 15px;
            border: none;
            border-radius: 40px;
            cursor: pointer;
        }
        input[type="submit"]:hover, button:hover {
            background-color: #D2691E;
        }
        .product-details {
            margin-bottom: 20px;
        }
        form {
            margin-bottom: 50px; 
        }
        .echo {
            margin-bottom: 50px; 
        }
    </style>
</head>
<body>
    <div class="form-container">
        <?php
        // Koneksi ke database
        include 'koneksi.php';

        // Ambil data produk dari database
        $sql = "SELECT id_pesanan, nama_barang, bahan_bahan, cara_membuat FROM pesanan WHERE id_pesanan = '$_GET[id]'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h2>Berikut Resepnya</h2>";
            while ($row = $result->fetch_assoc()) {
                echo "<div class='product-details'>";
                echo "Produk : " . $row['nama_barang'] . "<br><br>";
                echo "Bahan-bahan : " . $row['bahan_bahan'] . "<br><br>";
                echo "Cara Membuat : " . $row['cara_membuat'] . "<br><br>";
                
                echo "<form action='proses_beli.php' method='POST'>";
                echo "<input type='hidden' name='id_pesanan' value='" . $row['id_pesanan'] . "'>";
                echo '<button type="button" onclick="history.back()">Kembali</button>';
                echo "</form>";
                echo "</div>";
            }
        } else {
            echo "Tidak ada produk tersedia.";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
