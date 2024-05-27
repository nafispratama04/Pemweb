<?php
require_once('function/helper.php');
require_once('connakun.php');
?>

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
$sql = "SELECT * FROM pemesanan_tiket";
$result = $conn->query($sql);
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
		<li>
			<a href="dashboardadmin.php">
				<i class='bx bxs-dashboard' ></i>
				<span class="text">Dashboard</span>
			</a>
		</li>
		<li class="<?php echo basename($_SERVER['PHP_SELF']) == 'konfirmasi-admin.php' ? 'active' : ''; ?>">
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
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num"></span>
			</a>
			<a href="#" class="profile">
			</a>
		</nav>

		<main>
			<div class="head-title">
				<div class="left">
					<h1>Konfirmasi Pesanan</h1>
				</div>
			</div>

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
								<th>ID Pesanan</th>
								<th>Tanggal Pesanan</th>
								<th>Rincian</th>
								<th>Status Pembayaran</th>
								<th>Konfirmasi</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
									echo "<tr>";
									echo "<td><i class='bx bx-user'></i><p>" . $row["nama"] . "</p></td>";
									echo "<td>" . $row["id"] . "</td>";
									echo "<td>" . $row["tanggal"] . "</td>";
									echo "<td>kosong</td>";
									echo "<td><span class='status completed'></span></td>";
									echo "<td>
											<select name='aksi'>
												<option value='option1'>Belum Terbayar</option>
												<option value='option2'>Terbayar</option>
											</select>
										  </td>";
									echo "<td><a href='#' class='btn'>Simpan</a></td>";
									echo "</tr>";
								}
							} else {
								echo "0 results";
							}
							$conn->close();
							?>
<!--
							<tr>
								<td>
                                    <i class='bx bx-user' ></i>
									<p>Tes</p>
								</td>
								<td>1</td>
								<td>xx-xx-xxxx</td>
								<td>Dewasa 1</td>
								<td><span class="status completed">Completed</span></td>
								<td>
									<select name="aksi">
										<option value="option1">Belum Terbayar</option>
										<option value="option2">Terbayar</option>
									</select>
								</td>
								<td>
									<a href="#" class="btn">Simpan</a>
								</td>
							</tr>
-->
						</tbody>
					</table>
			</div>
		</main>
	</section>
	<script src="script/admin.js"></script>
</body>
</html>