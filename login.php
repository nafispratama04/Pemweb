<?php
include('connakun.php');
session_start();

$status = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Username = $_POST['Username'] ?? '';
    $Password_ = $_POST['Password_'] ?? '';

    if (!empty($Username) && !empty($Password_)) {
        // Query SQL untuk memeriksa username dan password dengan prepared statement
        $conn = connection();
        $query = $conn->prepare("SELECT * FROM akun WHERE Username = ? AND Password_ = ?");
        $query->bind_param('ss', $Username, $Password_);
        $query->execute();
        $result = $query->get_result();
        
        if ($result->num_rows > 0) {
            $status = 'ok';
            // Set session dan redirect ke halaman index
            $_SESSION['Username'] = $Username;
            header('Location: waikikiDashboard.html');
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
    <?php
    // menampilkan pesan sukses atau error
    if ($status == 'ok') {
        echo '<div class="success">Login berhasil!</div>';
    } elseif ($status == 'err') {
        echo '<div class="error">ERROR!, Username atau Password salah</div>';
    }
    ?>
    <div class="header">
        <img src="LOGOWaikiki.png">
        <h1>WAIKIKI BEACH</h1>
    </div>
    <div class="container">
        <h2>Login</h2>
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
