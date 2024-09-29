<?php

$server = "localhost";
$user = "root";
$password = "";
$nama_database = "jb";

$db = mysqli_connect($server, $user, $password, $nama_database);

if( !$db ){
    die("Gagal dengan database: " . mysqli_connect_error());
}

?>