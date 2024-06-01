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

// Update status pembayaran
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['status_pembayaran'])) {
    $id = $_POST['id'];
    $status_pembayaran = $_POST['status_pembayaran'];

    // Menggunakan prepared statement untuk menghindari SQL injection
    $sql = "UPDATE pemesanan_tiket SET status_pembayaran=? WHERE id=?";
    $stmt = $conn->prepare($sql);

    // Periksa apakah prepared statement berhasil dipersiapkan
    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("si", $status_pembayaran, $id);

        // Jalankan pernyataan
        if ($stmt->execute()) {
            // Jika berhasil, arahkan kembali ke halaman konfirmasi-admin
            header("Location: konfirmasi-admin.php");
            exit(); // Pastikan untuk menghentikan eksekusi script setelah redirect
        } else {
            // Jika terjadi kesalahan saat menjalankan pernyataan
            echo "Error updating record: " . $stmt->error;
        }
    } else {
        // Jika gagal mempersiapkan pernyataan
        echo "Error preparing statement: " . $conn->error;
    }

    // Tutup pernyataan
    $stmt->close();
}

// Update status pemesanan jika tiket telah dicetak
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['status_pemesanan'])) {
    $id = $_POST['id'];
    $status_pemesanan = $_POST['status_pemesanan'];

    // Menggunakan prepared statement untuk menghindari SQL injection
    $sql = "UPDATE pemesanan_tiket SET status_pemesanan=? WHERE id=?";
    $stmt = $conn->prepare($sql);

    // Periksa apakah prepared statement berhasil dipersiapkan
    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("si", $status_pemesanan, $id);

        // Jalankan pernyataan
        if ($stmt->execute()) {
            // Jika berhasil, arahkan kembali ke halaman cetak tiket
            header("Location: CetakTiket.php");
            exit(); // Pastikan untuk menghentikan eksekusi script setelah redirect
        } else {
            // Jika terjadi kesalahan saat menjalankan pernyataan
            echo "Error updating record: " . $stmt->error;
        }
    } else {
        // Jika gagal mempersiapkan pernyataan
        echo "Error preparing statement: " . $conn->error;
    }

    // Tutup pernyataan
    $stmt->close();
}

// Tutup koneksi
$conn->close();
?>