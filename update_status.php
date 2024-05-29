<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wisata";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $status_pembayaran = $_POST['status_pembayaran'];

    // Menggunakan prepared statement untuk menghindari SQL injection
    $sql = "UPDATE pemesanan_tiket SET status_pembayaran=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $status_pembayaran, $id);

    if ($stmt->execute()) {
        header("Location: konfirmasi-admin.php");
        exit(); // Pastikan untuk menghentikan eksekusi script setelah redirect
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>