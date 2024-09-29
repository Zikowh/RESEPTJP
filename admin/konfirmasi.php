<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #FFFFFF;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .receipt-container {
            width: 450px;
            background-color: #FFFFFF;
            padding: 20px;
            border-radius: 30px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.9);
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 200px;
        }
        .total {
            font-weight: none;
            text-align: right;
        }
        button:hover {
            background-color: #D2691E;
        }
        .btn-danger {
            background-color: #A9A9A9;
            color: black;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }
        .btn-danger:hover {
            background-color: #D2691E;
        }

        input[type="submit"], button {
            background-color: #F0F0F0;
            color: #000000;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover, button:hover {
            background-color: #D2691E;
        }
        
    </style>
</head>
<body>
<div class="receipt-container">
        <?php
        // Include file koneksi
        include 'config.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_pesanan = $_POST['id_pesanan'];
            $jumlah = $_POST['jumlah'];

            // Ambil harga barang dari database
            $sql = "SELECT nama_barang, harga FROM pesanan WHERE id_pesanan = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id_pesanan);
            $stmt->execute();
            $stmt->bind_result($nama_barang, $harga);
            $stmt->fetch();
            $stmt->close();

            if ($harga) {
                // Menghitung total harga berdasarkan jumlah produk
                $total = $harga * $jumlah;

                // Menampilkan rincian pembelian
                echo "<h1>Rincian Pembelian</h1>";
                echo "Nama: " . $_POST['nama'] . "<br><br>";
                echo "Produk: " . $nama_barang . "<br><br>";
                echo "Jumlah: " . $jumlah . "<br><br>";
                echo "Harga per Unit: Rp " . number_format($harga, 0, ',', '.') . "<br><br>";
                echo "<b>Total Harga: Rp " . number_format($total, 0, ',', '.') . "<br><br></b><br>";
                echo "<a href='pesanan.php'><button type='button' class='btn-gray'>Kembali</button></a>";
            } else {
                echo "Produk tidak ditemukan.";
            }
        } else {
            echo "Tidak ada data yang dikirim.";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>