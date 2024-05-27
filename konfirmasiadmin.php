<?php
require_once('function/helper.php');
require_once('connakun.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="Styling/admin.css">

	<title>Halaman Admin</title>
</head>

<body>
	<section id="sidebar">
		<a href="#" class="brand">
            <i class='bx bxs-user-voice'></i>
			<span class="text">Halaman Admin</span>
		</a>
		<ul class="side-menu top">
		<li class="<?php echo basename($_SERVER['PHP_SELF']) == 'dashboardadmin.php' ? 'active' : ''; ?>">
			<a href="dashboardadmin.php">
				<i class='bx bxs-dashboard' ></i>
				<span class="text">Dashboard</span>
			</a>
		</li>
		<li class="<?php echo basename($_SERVER['PHP_SELF']) == 'konfirmasiadmin.php' ? 'active' : ''; ?>">
			<a href="konfirmasiadmin.php">
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
								<th>Tanggal Pesanan</th>
								<th>Status Pembayaran</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
                                    <i class='bx bx-user' ></i>
									<p>Tes</p>
								</td>
								<td>xx-xx-xxxx</td>
								<td><span class="status completed">Completed</span></td>
								<td>
									<select name="aksi">
										<option value="option1">Belum Terbayar</option>
										<option value="option2">Terbayar</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>
                                    <i class='bx bx-user' ></i>
									<p>Tes</p>
								</td>
								<td>xx-xx-xxxx</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
                                    <i class='bx bx-user' ></i>
									<p>Tes</p>
								</td>
								<td>xx-xx-xxxx</td>
								<td><span class="status process">Process</span></td>
							</tr>
						</tbody>
					</table>
			</div>
		</main>
	</section>
	<script src="admin.js"></script>
</body>
</html>