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

// Ambil data tiket dari database
$sql = "SELECT * FROM pemesanan_tiket ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

// Jika data ditemukan
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nama = $row["nama"];
    $email = $row["email"];
    $telepon = $row["telepon"];
    $tanggal = $row["tanggal"];
    $dewasa = $row["dewasa"];
    $remaja = $row["remaja"];
    $anakAnak = $row["anak_anak"];
    $balita = $row["balita"];
    $totalHarga = $row["total_harga"];
} else {
    echo "Data tidak ditemukan.";
}

// Tutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Tiket</title>
    <link rel="stylesheet" href="CetakTiket.css">
</head>
<body>
   
<a href="waikikiDashboard.php" class="back-button">Kembali</a>
    <div class="ticket">
        <h1>Tiket Wisata</h1>
        <div class="ticket-info">
            <label>Nama Pembeli:</label>
            <p><?php echo $nama; ?></p>
        </div>
        <div class="ticket-info">
            <label>Email Pembeli:</label>
            <p><?php echo $email; ?></p>
        </div>
        <div class="ticket-info">
            <label>Nomor Telepon Pembeli:</label>
            <p><?php echo $telepon; ?></p>
        </div>
        <div class="ticket-info">
            <label>Tanggal Wisata:</label>
            <p><?php echo $tanggal; ?></p>
        </div>
        <div class="ticket-info">
            <label>Jumlah Tiket:</label>
            <p>Dewasa: <?php echo $dewasa; ?></p>
            <p>Remaja: <?php echo $remaja; ?></p>
            <p>Anak-Anak: <?php echo $anakAnak; ?></p>
            <p>Balita: <?php echo $balita; ?></p>
        </div>
        <div class="ticket-info">
            <p class="total">Total Harga: <?php echo $totalHarga; ?> IDR</p>
        </div>
        <button onclick="printTicket()">Cetak Tiket</button>
    </div>

    <script>
        function printTicket() {
            window.print();
        }
    </script>
</body>
</html>
