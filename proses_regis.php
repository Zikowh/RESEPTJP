<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $level = trim($_POST['level']);
    
    // Validasi input
    if (empty($username) || empty($password) || empty($level)) {
        header('Location: register.php?message=All fields are required.');
        exit;
    }
    
    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    
    // Periksa apakah username sudah terdaftar
    $stmt = mysqli_query($db, "SELECT * FROM user WHERE username = 'username'");
    
    if (mysqli_num_rows($stmt)) {
        header('Location: register.php?message=username is already registered.');
        exit;
    }
    
    // Simpan data pengguna ke database
    $stmt = mysqli_query($db, "INSERT INTO user (username, password, level) VALUES ('$username', '$password', '$level')");
    
    if ($stmt) {
        header('Location: index.php?message=Registration successful. Please log in.');
    } else {
        header('Location: register.php?message=Registration failed. Please try again.');
    }
    exit;
}
