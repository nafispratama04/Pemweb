<?php
include('connakun.php');

$status = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $No_telp = $_POST['No_telp'];
    $Username = $_POST['Username'];
    $Password_ = $_POST['Password_'];
    $Nama = $_POST['Nama'];
    $email = $_POST['email'];
    $NIK = $_POST['NIK'];
    //query SQL
    $query = "INSERT INTO akun (No_telp, Username, Password_, Nama, email, NIK) VALUES('$No_telp', '$Username', '$Password_', '$Nama', '$email', '$NIK')";

    $result = mysqli_query(connection(), $query);
    if ($result) {
        $status = 'ok';
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
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
</head>

<body>
    <div class="header">
        <img src="LOGOWaikiki.png">
        <h1>WAIKIKI BEACH</h1>
    </div>
    <div class="container">
        <h2>Register</h2>
        <form action="form.php" method="post">
            <div class="tabelupdate">
                <label for="">No. Telephone</label>
                <input type="text" placeholder="No. Telephone" name="No_telp" required></td>
                <label for="">Username</label>
                <input type="text" placeholder="Username" name="Username" required>
                <label for="">Password</label>
                <input type="password" placeholder="Password" name="Password_" required>
            </div>
            <div class="tabelupdate1">
                <label for="">Nama</label>
                <input type="text" placeholder="Nama" name="Nama" required>
                <label for="">Email</label>
                <input type="text" placeholder="Email" name="email" required>
                <label for="">NIK</label>
                <input type="text" placeholder="NIK" name="NIK" required>
            </div>
            <input class="tombol" type="submit" value="SIMPAN">
        </form>
        <p class="punya">Sudah punya akun? <a href="login.php">Login</a></p>
    </div>
<?php
//menampilkan pesan sukses atau error
if ($status == 'ok') {
    echo '<div class="success">Sukses! data berhasil disimpan</div>';
} elseif ($status == 'err') {
    echo '<div class="error">ERROR! data gagal disimpan</div>';
}
?>
</body>
</html>