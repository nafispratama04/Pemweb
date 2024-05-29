<?php
require_once('connakun.php');

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wisata";

try {
    // Buat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $sql = "SELECT bukti_pembayaran, nama_file FROM pemesanan_tiket WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($pdf_data, $nama_file);
        $stmt->fetch();

        // Tambahkan ini untuk menampilkan nama file dari database
        echo $nama_file;

        if ($stmt->num_rows > 0) {
            // Set header untuk tipe konten PDF
            header("Content-type: application/pdf");

            // Set header untuk menampilkan PDF dalam browser dengan nama file asli
            header("Content-Disposition: attachment; filename=\"" . $nama_file . "\"");

            // Tampilkan isi PDF
            echo $pdf_data;
        } else {
            echo "File not found.";
        }
        $stmt->close();
    } else {
        echo "Invalid request.";
    }
    $conn->close();
} catch (Exception $e) {
    die("An error occurred: " . $e->getMessage());
}
?>