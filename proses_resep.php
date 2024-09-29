<?php
require_once 'config.php';

// CREATE
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
    $nama_barang = trim($_POST['nama_barang']);
    $bahan_bahan = trim($_POST['bahan_bahan']);
    $foto = trim($_POST['foto']);
    $cara_membuat = trim($_POST['cara_membuat']);

    // Validasi input
    if (empty($nama_barang) || empty($bahan_bahan) || empty($foto) || empty($cara_membuat)) {
        header('Location: create.php?message=All fields are required.');
        exit;
    }

    // Simpan data ke database
    $stmt = $db->prepare("INSERT INTO pesanan (nama_barang, bahan_bahan, foto, cara_membuat) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('ssss', $nama_barang, $bahan_bahan, $foto, $cara_membuat);

    if ($stmt->execute()) {
        header('Location: pesanan.php?message=Data successfully added.');
    } 
    exit;
}

// READ
function getAllPesanan($db) {
    $stmt = $db->prepare("SELECT * FROM pesanan");
    $stmt->execute();
    return $stmt->get_result();
}

// UPDATE
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id_pesanan = $_POST['id_pesanan'];
    $nama_barang = trim($_POST['nama_barang']);
    $bahan_bahan = trim($_POST['bahan_bahan']);
    $foto = trim($_POST['foto']);
    $cara_membuat = trim($_POST['cara_membuat']);

    // Validasi input
    if (empty($nama_barang) || empty($bahan_bahan) || empty($foto) || empty($cara_membuat)) {
        header("Location: update.php?id=$id_pesanan&message=All fields are required.");
        exit;
    }

    // Update data di database
    $stmt = $db->prepare("UPDATE pesanan SET nama_barang = ?, bahan_bahan = ?, foto = ?, cara_membuat = ? WHERE id_pesanan = ?");
    $stmt->bind_param('ssssi', $nama_barang, $bahan_bahan, $foto, $cara_membuat, $id_pesanan);

    if ($stmt->execute()) {
        header('Location: index.php?message=Data successfully updated.');
    } else {
        header("Location: update.php?id=$id_pesanan&message=Failed to update data.");
    }
    exit;
}

// DELETE
if (isset($_GET['delete'])) {
    $id_pesanan = $_GET['delete'];

    // Hapus data dari database
    $stmt = $db->prepare("DELETE FROM pesanan WHERE id_pesanan = ?");
    $stmt->bind_param('i', $id_pesanan);

    if ($stmt->execute()) {
        header('Location: index.php?message=Data successfully deleted.');
    } else {
        header('Location: index.php?message=Failed to delete data.');
    }
    exit;
}

?>
