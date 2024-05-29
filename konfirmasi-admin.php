<?php
require_once('function/helper.php');
require_once('connakun.php');

// Koneksi ke database
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
            <li>
                <a href="dashboardadmin.php">
                    <i class='bx bxs-dashboard'></i>
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
                    <i class='bx bxs-cog'></i>
                    <span class="text">Pengaturan</span>
                </a>
            </li>
            <li>
                <a href="Logout.php" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>

    <section id="content">
        <nav>
            <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num"></span>
            </a>
            <a href="#" class="profile"></a>
        </nav>

        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Konfirmasi Pesanan</h1>
                </div>
            </div>

<<<<<<< HEAD
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
							try{
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
									echo "<tr>";
									echo "<td><i class='bx bx-user'></i><p>" . $row["nama"] . "</p></td>";
									echo "<td>" . $row["id"] . "</td>";
									echo "<td>" . $row["tanggal"] . "</td>";
									echo "<td>kosong</td>";
									echo "<td>" . (!empty($row["bukti_pembayaran"]) ? $row["bukti_pembayaran"] : "belum ada bukti bayar") . "</td>";
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
							$conn->close();} catch (Exception $e) {
								die("An error occurred: " . $e->getMessage());
							}
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
=======
            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Daftar Pesanan</h3>
                        <i class='bx bx-search'></i>
                        <i class='bx bx-filter'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>ID Pesanan</th>
                                <th>Tanggal Pesanan</th>
                                <th>Rincian</th>
                                <th>Lihat Pembayaran</th>
                                <th>Status Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    $rincian = "<ul>
                                                    <li>Dewasa: {$row['dewasa']}</li>
                                                    <li>Remaja: {$row['remaja']}</li>
                                                    <li>Anak-Anak: {$row['anak_anak']}</li>
                                                    <li>Balita: {$row['balita']}</li>
                                                </ul>";
                                    echo "<tr>";
                                    echo "<td><i class='bx bx-user'></i><p>" . $row["nama"] . "</p></td>";
                                    echo "<td>" . $row["id"] . "</td>";
                                    echo "<td>" . $row["tanggal"] . "</td>";
                                    echo "<td>" . $rincian . "</td>";
                                    echo "<td><a href='lihat_bukti.php?id=" . $row["id"] . "' class='btn' target='_blank'>Lihat Bukti</a></td>";
                                    echo "<td>
                                            <form method='post' action='update_status.php'>
                                                <input type='hidden' name='id' value='" . $row["id"] . "' />
                                                <select name='status_pembayaran'>
                                                    <option value='Belum Terbayar'" . ($row["status_pembayaran"] == 'Belum Terbayar' ? ' selected' : '') . ">Belum Terbayar</option>
                                                    <option value='Terbayar'" . ($row["status_pembayaran"] == 'Terbayar' ? ' selected' : '') . ">Terbayar</option>
                                                </select>
                                          </td>";
                                    echo "<td><input type='submit' value='Simpan' class='btn' /></form></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7'>0 results</td></tr>";
                            }
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </section>
    <script src="script/admin.js"></script>
>>>>>>> 140128d7e50c328b1a7fc6887a0d604d349bbfb1
</body>
</html>