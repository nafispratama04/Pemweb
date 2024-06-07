<?php
require_once('function/helper.php');
require_once('connakun.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wisata";

try {
    // Buat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        throw new Exception("connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM pemesanan_tiket";
    $result = $conn->query($sql);
} catch (Exception $e) {
    die("An error occurred: " . $e->getMessage());
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="style/admin.css">

	<title>Halaman Admin</title>
</head>

<body>
	<section id="sidebar">
		<a href="#" class="brand">
            <i class='bx bxs-user-voice'></i>
			<span class="text">Halaman Admin</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="konfirmasi-admin.php">
                    <i class='bx bxs-check-circle'></i>
					<span class="text">Konfirmasi</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Pengaturan</span>
				</a>
			</li>
			<li>
				<a href="Logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>

	<section id="content">
		<nav>
			<a href="konfirmasi-admin.php" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num"></span>
			</a>
			<a href="#" class="profile">
			</a>
		</nav>

		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
				</div>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>
						<?php
							$sql = "SELECT COUNT(*) as jumlahpesanan FROM pemesanan_tiket";
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
									if ($row["jumlahpesanan"] >=1) {
										echo " " . $row["jumlahpesanan"];
									} else {
										echo "Tidak Tersedia";
									}
								}
							}?>
						</h3>
						<p>Pesanan</p>
					</span>
				</li>
				<li>
                    <i class='bx bx-money' ></i>
					<span class="text">
						<h3>
						<?php
							$sql = "SELECT SUM(total_harga) as jumlahlaba FROM pemesanan_tiket";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
									if ($row["jumlahlaba"] !== NULL) {
										echo " Rp. " . $row["jumlahlaba"];
									} else {
										echo "Tidak Tersedia";
									}
								}
							}?>
						</h3>
						<p>Jumlah Laba</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Daftar Pesanan</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>User</th>
								<th>Tanggal Pesanan</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT nama, tanggal, status_pembayaran, bukti_pembayaran FROM pemesanan_tiket";
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
									echo "<tr>";
									echo "<td>";
									echo "<i class='bx bx-user' ></i>";
									echo "<p>" . $row["nama"] . "</p>";
									echo "</td>";
									echo "<td>" . $row["tanggal"] . "</td>";
									if ($row["status_pembayaran"] == "Terbayar" && $row["bukti_pembayaran"] !== NULL) {
										echo "<td><span class='status completed'>Completed</span></td>";
									} else if ($row["status_pembayaran"] == "Belum Terbayar" && $row["bukti_pembayaran"] !== NULL) {
										echo "<td><span class='status process'>Process</span></td>";
									} else if ($row["bukti_pembayaran"] == NULL) {
										echo "<td><span class='status pending'>Pending</span></td>";
									}
									echo "</tr>";
								}
							}
							?>
						</tbody>
					</table>
			</div>
		</main>
	</section>
	<script src="script/script.js"></script>
</body>
</html>