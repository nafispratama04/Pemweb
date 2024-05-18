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

// Ambil data dari tabel pemesanan_tiket
$sql = "SELECT * FROM pemesanan_tiket";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Pemesanan Tiket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-image: url("Assets/waikiki.jpg");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-color: rgba(38, 150, 233, 0.5);
        }
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            color: #fff;
            font-size: 1em;
            font-weight: 500;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            transition: color 0.3s ease;
        }
        .back-button:before {
            content: "";
            position: absolute;
            background: #fff;
            width: 0;
            height: 3px;
            bottom: 0;
            left: 0;
            transition: width 0.3s ease;
        }
        .back-button:hover:before {
            width: 100%;
        }
        .invoice-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 1000px;
            margin: auto;
        }
        .invoice-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        .action-cell {
            width: 150px;
            text-align: center;
        }
        .btn-bayar {
            background-color: #4CAF50;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            text-align: center;
            display: inline-block;
        }
        .btn-bayar:hover {
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
</head>
<body>
    <a href="waikikiDashboard.html" class="back-button">Kembali</a>
    <div class="invoice-container">
        <h1>Invoice Pemesanan Tiket</h1>
        <?php
        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Tanggal</th>
                        <th>Dewasa</th>
                        <th>Remaja</th>
                        <th>Anak-Anak</th>
                        <th>Balita</th>
                        <th>Total Harga</th>
                        <th class='action-cell'>Aksi</th>
                    </tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["nama"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["telepon"] . "</td>
                        <td>" . $row["tanggal"] . "</td>
                        <td>" . $row["dewasa"] . "</td>
                        <td>" . $row["remaja"] . "</td>
                        <td>" . $row["anak_anak"] . "</td>
                        <td>" . $row["balita"] . "</td>
                        <td>" . $row["total_harga"] . "</td>
                        <td class='action-cell'><a href='bayar.php?id=" . $row["id"] . "' class='btn-bayar'>Bayar</a></td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Tidak ada pemesanan tiket.</p>";
        }
        ?>
    </div>
    <div id="popup">
        <div class="checkmark"></div>
        <p>Pembayaran berhasil, silahkan menuju halaman history transaksi</p>
    </div>
    <script>
        function showPopup() {
            document.getElementById('popup').style.display = 'block';
            document.getElementById('popup').classList.add('show');
        }
    </script>
</body>
</html>

<?php
$conn->close();
?>