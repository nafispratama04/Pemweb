<?php
include('connakun.php');
session_start();

$status = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Username = $_POST['Username'] ?? '';
    $Password_ = $_POST['Password_'] ?? '';

    if (!empty($Username) && !empty($Password_)) {
        $conn = connection();
        $query = $conn->prepare("SELECT * FROM akun WHERE Username = ? AND Password_ = ?");
        $query->bind_param('ss', $Username, $Password_);
        $query->execute();
        $result = $query->get_result();
        
        if ($result->num_rows > 0) {
            $status = 'ok';
            $data = $result->fetch_assoc(); 

            $_SESSION['No_telp'] = $data['No_telp'];
            $_SESSION['Username'] = $Username;
            
            header('Location: waikikiDashboard.php');
            exit();
        } else {
            $status = 'err';
        }
    } else {
        $status = 'err';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="header">
        <img src="Assets/LOGOWaikiki.png">
        <h1>WAIKIKI BEACH</h1>
        <div class="home">
            <a href="landingpage.html" class="gambarhome">
                <img src="Assets/home.png" alt="HOME">
            </a>
        </div>
    </div>
    <div class="container">
        <h2>Login</h2>
        <?php
        // menampilkan pesan sukses atau error
        if ($status == 'ok') {
            echo '<div class="success">Login berhasil!</div>';
        } elseif ($status == 'err') {
            echo '<div class="error">ERROR!, Username atau Password salah</div>';
        }
        ?>
        <form action="login.php" method="post">
            <div class="tabelupdate">
                <label for="Username">Username</label>
                <input type="text" placeholder="Username" name="Username" required>
                <label for="Password_">Password</label>
                <input type="password" placeholder="Password" name="Password_" required>
            </div>
            <input class="tombol" type="submit" value="LOGIN">
        </form>
        <div class="button-container">
            <a href="form.php" class="tombol1">
                <h3>DAFTAR</h3>
            </a>
        </div>
    </div>
</body>
</html>
