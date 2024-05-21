<?php
include('connakun.php');
session_start();

$status = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Username_admin = $_POST['Username_admin'] ?? '';
    $Password_admin = $_POST['Password_admin'] ?? '';

    if (!empty($Username_admin) && !empty($Password_admin)) {
        // Query SQL untuk memeriksa username dan password dengan prepared statement
        $conn = connection();
        $query = $conn->prepare("SELECT * FROM admin_wisata WHERE Username_admin = ? AND Password_admin = ?");
        $query->bind_param('ss', $Username_admin, $Password_admin);
        $query->execute();
        $result = $query->get_result();
        
        if ($result->num_rows > 0) {
            $status = 'ok';
            // Set session dan redirect ke halaman dashboardadmin.php
            $_SESSION['Username_admin'] = $Username_admin;
            header('Location: dashboardadmin.php');
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
    <title>Login Admin</title>
    <link rel="stylesheet" href="loginadmin.css">
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
        <img src="Assets/LOGOWaikiki.png" alt="Logo Waikiki">
        <h1>WAIKIKI BEACH</h1>
        <div class="home">
            <a href="landingpage.html" class="gambarhome">
                <img src="Assets/home.png" alt="HOME">
            </a>
        </div>
    </div>
    <div class="container">
        <h2>Login Admin</h2>
        <form action="loginadmin.php" method="post">
            <div class="tabelupdate">
                <label for="Username_admin">Username</label>
                <input type="text" placeholder="Username" name="Username_admin" required>
                <label for="Password_admin">Password</label>
                <input type="password" placeholder="Password" name="Password_admin" required>
            </div>
            <input class="tombol" type="submit" value="LOGIN">
        </form>
    </div>
</body>
</html>