<!DOCTYPE html>
<?php
session_start();
    if (empty($_SESSION) || count($_COOKIE) == 0) {
        echo "<script>alert('Login dulu ya..');document.location.href='../index.php';</script>";
    }elseif (!isset($_SESSION['id_bencana'])) {
        echo "<script>document.location.href='../daftar-bencana.php';</script>";
    }elseif (!isset($_SESSION['loginRelawan'])) {
		echo "<script>alert('Access Denied..');document.location.href='../home.php';</script>";
	}
    require '../PHP/config.php';
	$user = $_SESSION['user'];
?>
<html>
<head>
	<title>Ayo Relawan</title>
	<link rel="stylesheet" type="text/css" href="../CSS/style-relawan.css">
	<link rel="icon" href="../Images/page-icon.png">
	<script type="text/javascript" src="../Ajax/ayo_relawan/ayo_relawan_1/tampil_alamat.js"></script>
</head>
<body onload ="ambilData();">

	<div class="navbar-logo">
		<div class="logo">
			<a href="../home.php" id="home"><img src="../Images/logo.png" /></a>
		</div>
		<div class="user">
			<?php 
				if (isset($_SESSION['loginRelawan']) == true) {
					$nama = mysqli_query($conn, "SELECT NAMA FROM RELAWAN WHERE USERNAME = '$user'");
						foreach ($nama as $value) {
							$explode = explode(' ', $value['NAMA']);
							echo "<a href='profile.php' id='user'><img src='../Images/user.png'><p id='user'>" . $explode[0] . '</p></a>';
						}
				}
			?>
		</div>
	</div>

	<div class="semua">
		<div class="langkah">
			<ul>
				<li>
					<img src="../Images/angka/1.png" alt="1">
					<div class="tulisan">
						<p id="pilih">Daftar Alamat</p>
					</div>
				</li>
				<li>
					<img src="../Images/angka/black-2.png" alt="2">
					<div class="tulisan">
						<p>Pilih Bencana</p>
					</div>
				</li>
				<li>
					<img src="../Images/angka/black-3.png" alt="3">
					<div class="tulisan">
						<p>Konfirmasi</p>
					</div>
                </li>
                <li>
					<img src="../Images/angka/black-4.png" alt="4">
					<div class="tulisan">
						<p>Tunggu Penjemputan</p>
					</div>
				</li>
			</ul>
		</div>
		<div class="whole">
			<div class="back-title">
				<p id="title">Alamat</p>
			</div>
			<div class="alamat">
				<form method="POST">
				<table class="daftar_alamat" id="daftar">
						<center>
						</center>
					</table>
					<button type="button" id="add" name="add" onclick="document.location.href='../tambah_alamat.php'">Tambah</button>
				</form>
			</div>
		</div>
		<input type="submit" id="next" name="next" value="Selanjutnya" onclick="document.location.href='ayo-relawan2.php';">
	</div>
</body>
</html>