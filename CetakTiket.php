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

// Ambil semua data tiket dari database
$sql = "SELECT * FROM pemesanan_tiket ORDER BY id ASC";
$result = $conn->query($sql);

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
    <style>
        @media print {
            .ticket {
                page-break-after: always;
            }
        }
    </style>
</head>
<body>
   
<a href="waikikiDashboard.php" class="back-button">Kembali</a>

<?php
if ($result->num_rows > 0) {
    $no = 1;
    while($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $nama = $row["nama"];
        $email = $row["email"];
        $telepon = $row["telepon"];
        $tanggal = $row["tanggal"];
        $dewasa = $row["dewasa"];
        $remaja = $row["remaja"];
        $anakAnak = $row["anak_anak"];
        $balita = $row["balita"];
        $totalHarga = $row["total_harga"];
        $statusPembayaran = $row["status_pembayaran"]; // Asumsi kolom ini ada di tabel

        echo '
        <div class="ticket" id="ticket-' . $id . '">
            <h1>Tiket Wisata - Pesanan ' . $no . '</h1>
            <div class="ticket-info">
                <label>Nama Pembeli:</label>
                <p>' . $nama . '</p>
            </div>
            <div class="ticket-info">
                <label>Email Pembeli:</label>
                <p>' . $email . '</p>
            </div>
            <div class="ticket-info">
                <label>Nomor Telepon Pembeli:</label>
                <p>' . $telepon . '</p>
            </div>
            <div class="ticket-info">
                <label>Tanggal Wisata:</label>
                <p>' . $tanggal . '</p>
            </div>
            <div class="ticket-info">
                <label>Jumlah Tiket:</label>
                <p>Dewasa: ' . $dewasa . '</p>
                <p>Remaja: ' . $remaja . '</p>
                <p>Anak-Anak: ' . $anakAnak . '</p>
                <p>Balita: ' . $balita . '</p>
            </div>
            <div class="ticket-info">
                <p class="total">Total Harga: ' . $totalHarga . ' IDR</p>
            </div>';
            
        if ($statusPembayaran == "Terbayar") {
            echo '<button onclick="printSpecificTicket(' . $id . ')">Cetak Tiket</button>';
        } else {
            echo '<button onclick="showWarning()">Cetak Tiket</button>';
        }
        
        echo '</div>';
        $no++;
    }
} else {
    echo "Data tidak ditemukan.";
}
?>

<script>
    function printSpecificTicket(id) {
        var printContents = document.getElementById('ticket-' + id).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
        location.reload();  // Reload the page to restore the original content

        // Update status pemesanan menjadi "Sudah Selesai"
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "update_status.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("id=" + id + "&status_pemesanan=Sudah Selesai");
    }

    function showWarning() {
        alert('Belum Bisa Mencetak Tiket! Tunggu Konfirmasi Pembayaran Dari Admin Wisata!');
    }
</script>
</body>
</html>