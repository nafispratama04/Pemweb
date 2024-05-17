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

// Proses pengiriman data jika form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape input untuk mencegah serangan SQL Injection
    $nama = $conn->real_escape_string($_POST['nama']);
    $email = $conn->real_escape_string($_POST['email']);
    $telepon = $conn->real_escape_string($_POST['telepon']);
    $tanggal = $conn->real_escape_string($_POST['tanggal']);
    $dewasa = $conn->real_escape_string($_POST['dewasa']);
    $remaja = $conn->real_escape_string($_POST['remaja']);
    $anakAnak = $conn->real_escape_string($_POST['anakAnak']);
    $balita = $conn->real_escape_string($_POST['balita']);
    $totalHarga = $conn->real_escape_string($_POST['totalHarga']);

    // Query SQL untuk menyimpan data ke tabel pemesanan_tiket
    $sql = "INSERT INTO pemesanan_tiket (nama, email, telepon, tanggal, dewasa, remaja, anak_anak, balita, total_harga)
            VALUES ('$nama', '$email', '$telepon', '$tanggal', '$dewasa', '$remaja', '$anakAnak', '$balita', '$totalHarga')";

    if ($conn->query($sql) === TRUE) {
    echo "<script>
            window.onload = function() {
                showPopup();
                setTimeout(function(){
                    window.location.href = 'waikikiDashboard.html';
                }, 2000);
            }
            </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


}

// Tutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beli Tiket Wisata</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url("waikiki.jpg");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-color: rgba(38, 150, 233, 0.5);
        }
        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            width: 500px;
            max-width: 100%;
            margin: auto;
        }
        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            max-width: 100%;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"], input[type="email"], input[type="date"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        #popup {
            display: none;
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: white;
            border: 2px solid #4CAF50;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
            z-index: 1000;
        }
        #popup.show {
            display: block;
        }
        #popup.show .checkmark {
        display: inline-block;
        }
        .checkmark {
            width: 40px;
            height: 40px;
            display: inline-block;
            border-radius: 50%;
            border: 5px solid #4CAF50;
            position: relative;
            animation: pop-in 0.5s ease;
        }
        .checkmark::after {
            content: '';
            position: absolute;
            top: 8px;
            left: 12px;
            width: 12px;
            height: 22px;
            border: solid white;
            border-width: 0 4px 4px 0;
            transform: rotate(45deg);
            animation: draw-check 0.5s ease 0.2s forwards;
        }
        @keyframes pop-in {
            0% { transform: scale(0); }
            100% { transform: scale(1); }
        }
        @keyframes draw-check {
            0% { width: 0; height: 0; }
            100% { width: 12px; height: 22px; }
        }
        @-webkit-keyframes pop-in {
            0% { transform: scale(0); }
            100% { transform: scale(1); }
        }
        @-webkit-keyframes draw-check {
            0% { width: 0; height: 0; }
            100% { width: 12px; height: 22px; }
        }
    </style>
    <script>
        function calculateTotal() {
            var dewasa = document.getElementById('dewasa').value;
            var remaja = document.getElementById('remaja').value;
            var anakAnak = document.getElementById('anakAnak').value;
            var balita = document.getElementById('balita').value;

            var total = (dewasa * 20000) + (remaja * 15000) + (anakAnak * 10000) + (balita * 5000);

            document.getElementById('totalHarga').value = total;
        }
        function showPopup() {
            document.getElementById('popup').style.display = 'block';
            document.getElementById('popup').classList.add('show');
        }
    </script>
</head>
<body>
    <div class="form-container">
    <h1>Beli Tiket Wisata</h1>
    <form method="post" action="">
        <label for="nama">Nama Pembeli:</label>
        <input type="text" id="nama" name="nama" required>

        <label for="email">Email Pembeli:</label>
        <input type="email" id="email" name="email" required>

        <label for="telepon">Nomor Telepon Pembeli:</label>
        <input type="text" id="telepon" name="telepon" required>

        <label for="tanggal">Tanggal Wisata:</label>
        <input type="date" id="tanggal" name="tanggal" required>

        <h2>Pemesanan Tiket:</h2>
        <label for="dewasa">Dewasa (20,000 IDR):</label>
        <input type="number" id="dewasa" name="dewasa" value="0" min="0" oninput="calculateTotal()" required>

        <label for="remaja">Remaja (15,000 IDR):</label>
        <input type="number" id="remaja" name="remaja" value="0" min="0" oninput="calculateTotal()" required>

        <label for="anakAnak">Anak-Anak (10,000 IDR):</label>
        <input type="number" id="anakAnak" name="anakAnak" value="0" min="0" oninput="calculateTotal()" required>

        <label for="balita">Balita (5,000 IDR):</label>
        <input type="number" id="balita" name="balita" value="0" min="0" oninput="calculateTotal()" required>

        <label for="totalHarga">Total Harga (IDR):</label>
        <input type="text" id="totalHarga" name="totalHarga" readonly>

        <input type="submit" value="Beli Tiket">
    </form>
    </div>

    <div id="popup">
        <div class="checkmark"></div>
        <p>Pemesanan tiket berhasil, silahkan menuju pages invoice</p>
    </div>
</body>
</html>