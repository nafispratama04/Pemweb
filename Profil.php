<?php
session_start(); // Memulai session, pastikan ini ada di awal halaman
include('connakun.php');

$status = '';

// Pastikan pengguna sudah login sebelum melanjutkan
if (!isset($_SESSION['No_telp'])) {
    header('Location: login.php'); // Arahkan ke halaman login jika belum login
    exit;
}

$No_telp = $_SESSION['No_telp']; // Ambil No_telp pengguna dari session

// Mengambil data untuk ditampilkan di form saat menggunakan GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $query = "SELECT * FROM akun WHERE No_telp = '$No_telp'";
    $result = mysqli_query(connection(), $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    } else {
        $status = 'err';
        echo "Error fetching data: " . mysqli_error(connection());
    }
}

// Mengupdate data ketika form disubmit menggunakan POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Username = $_POST['Username'];
    $Password_ = $_POST['Password_'];
    $Nama = $_POST['Nama'];
    $email = $_POST['email'];
    $NIK = $_POST['NIK'];

    $sql = "UPDATE akun SET Username='$Username', Password_='$Password_', Nama='$Nama', email='$email', NIK='$NIK' WHERE No_telp='$No_telp'";

    $result = mysqli_query(connection(), $sql);

    if ($result) {
        $status = 'ok';
        header('Location: waikikiDashboard.php?status=' . $status);
        exit;
    } else {
        $status = 'err';
        echo "Error updating data: " . mysqli_error(connection());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Profil</title>
    <link rel="stylesheet" href="Profil.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Goblin+One&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Acme&display=swap">
</head>
<body>
    <?php
    // Menampilkan pesan sukses atau error
    if ($status == 'ok') {
        echo '<div class="success">Sukses!, data berhasil di-update</div>';
    } elseif ($status == 'err') {
        echo '<div class="error">ERROR!, data gagal di-update</div>';
    }
    ?>
    <nav>
        <div class="LayarDalam">
            <div class="logoDashboard">
                <a href="https://www.google.com" target="_blank">
                    <img src="Assets/LOGOWaikiki.png" class="navgelap" alt="Logo Waikiki"/>
                </a>
            </div>
            <div class="Fitur">
                <a href="#" class="tombolfitur">
                    <span class="garis"></span>
                    <span class="garis"></span>
                    <span class="garis"></span>
                </a>
                <ul>
                    <li><a href="waikikiDashboard.php">Beranda</a></li>
                    <li><a href="Tiket.php">Tiket</a></li>
                    <li><a href="Tagihan.php">Tagihan</a></li>
                    <li><a href="CetakTiket.php">CetakTiket</a></li>
                    <li><a href="Riwayat.php">Riwayat</a></li>
                    <li><a href="profil.php">Profil</a></li>
                    <li><a href="Logout.php">Logout</a></li>
                </ul>
            </div>
            <div class="container">
                <h2>Informasi Profil</h2>
                <form action="Profil.php" method="post">
                    <div class="tabelupdate">
                        <label for="No_telp">No. Telephone</label>
                        <input type="text" id="No_telp" name="No_telp" value="<?php echo htmlspecialchars($data['No_telp'] ?? ''); ?>" required readonly>
                        <label for="Username">Username</label>
                        <input type="text" id="Username" name="Username" value="<?php echo htmlspecialchars($data['Username'] ?? ''); ?>" required>
                        <label for="Password_">Password</label>
                        <input type="password" id="Password_" name="Password_" value="<?php echo htmlspecialchars($data['Password_'] ?? ''); ?>" required>
                    </div>
                    <div class="tabelupdate1">
                        <label for="Nama">Nama</label>
                        <input type="text" id="Nama" name="Nama" value="<?php echo htmlspecialchars($data['Nama'] ?? ''); ?>" required>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($data['email'] ?? ''); ?>" required>
                        <label for="NIK">NIK</label>
                        <input type="text" id="NIK" name="NIK" value="<?php echo htmlspecialchars($data['NIK'] ?? ''); ?>" required>
                    </div>
                    <button type="submit" class="tombol">SIMPAN</button>
                </form>
                <div class="button-container">
                    <a href="waikikiDashboard.php" class="tombol1">
                        <h3>BATAL</h3>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <div class="LayarPenuh">
        <header id="Beranda">
            <div class="overlay"></div>
            <video autoplay muted loop>
                <source src="Assets/VideoPantai3.mp4" type="video/mp4" />
            </video>
        </header>
    </div>
</body>
</html>
