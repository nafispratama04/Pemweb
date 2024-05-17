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

// Periksa apakah parameter id ada dalam query string
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    die("ID tidak ditemukan.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["bukti_pembayaran"])) {
    $id = $_POST['id'];
    $fileName = $_FILES["bukti_pembayaran"]["name"];
    $fileTmpName = $_FILES["bukti_pembayaran"]["tmp_name"];
    $fileSize = $_FILES["bukti_pembayaran"]["size"];
    $fileError = $_FILES["bukti_pembayaran"]["error"];
    $fileType = $_FILES["bukti_pembayaran"]["type"];

    $fileNameParts = explode('.', $fileName);
    $fileExt = strtolower(end($fileNameParts));
    $allowed = array('pdf');

    if (in_array($fileExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = uniqid('', true) . "." . $fileExt;
                $fileDestination = 'uploads/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                $sql = "UPDATE pemesanan_tiket SET bukti_pembayaran='$fileNameNew' WHERE id='$id'";

                if ($conn->query($sql) === TRUE) {
                    echo "<script>
                            window.onload = function() {
                                showPopup();
                                document.getElementById('popup').style.display = 'block';
                                document.getElementById('popup').classList.add('show');
                                setTimeout(function(){
                                    window.location.href = 'waikikiDashboard.html';
                                }, 2000);
                            }
                            </script>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "File terlalu besar!";
            }
        } else {
            echo "Terjadi kesalahan saat mengunggah file!";
        }
    } else {
        echo "Hanya file PDF yang diizinkan!";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bayar Tiket Wisata</title>
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
        input[type="file"] {
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
        function showPopup() {
            document.getElementById('popup').style.display = 'block';
            document.getElementById('popup').classList.add('show');
        }
    </script>
</head>
<body>
    <div class="form-container">
        <h1>Unggah Bukti Pembayaran</h1>
        <form method="post" enctype="multipart/form-data" action="">
            <label for="bukti_pembayaran">Unggah Bukti Pembayaran (PDF):</label>
            <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" accept=".pdf" required>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" value="Unggah">
        </form>
    </div>

    <div id="popup">
        <div class="checkmark"></div>
        <p>Pembayaran berhasil, silahkan menuju halaman history transaksi</p>
    </div>
</body>
</html>