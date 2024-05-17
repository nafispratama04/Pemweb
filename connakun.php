<?php

function connection()
{
    // membuat konekesi
    $dbServer = 'localhost';
    $dbUser = 'root';
    $dbPass = '';
    $dbName = "wisata";

    $conn = mysqli_connect($dbServer, $dbUser, $dbPass);

    if (!$conn) {
        die('Koneksi gagal: ' . mysqli_error($conn));
    }
    //memilih database yang akan dipakai
    mysqli_select_db($conn, $dbName);

    return $conn;
}
