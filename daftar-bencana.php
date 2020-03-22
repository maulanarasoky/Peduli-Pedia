<!DOCTYPE html>
<html>
<head>
	<title>Daftar Bencana</title>
	<link rel="stylesheet" type="text/css" href="CSS/style-donasi.css">
	<link rel="stylesheet" type="text/css" href="CSS/daftar-bencana.css">
	<link rel="icon" href="images/page-icon.png">
	<script src="Ajax/daftar-bencana/daftar-bencana.js"></script>
</head>
<body onload="ambilData();">

	<?php
		session_start();
			if (empty($_SESSION) || count($_COOKIE) == 0) {
				echo "<script>alert('Login dulu ya...');document.location.href='index.php';</script>";
			}elseif (isset($_SESSION['loginDonatur']) == true || isset($_SESSION['loginRelawan']) == true) {
			}else {
				echo "<script>alert('Access Denied..');document.location.href='home.php';</script>";
			}
			require 'PHP/config.php';
			$user = $_SESSION['user'];
			require 'Navbar/navbar.php';
	?>

	<div class="home-artikel">
		<div class="side-menu">
			<?php  
					if (empty($_SESSION) || count($_COOKIE) == 0) {
						echo "<a href='index.php'>Beranda</a><br>";
					}
					else {
						echo "<a href='home.php'>Beranda</a><br>";
					}
				?>
			<a href="tentang-kami.php">Tentang Kami</a><br>
			<a href="artikel.php">Artikel</a><br>
			<a href="daftar-bencana.php">Daftar Bencana</a>
		</div>
		<div class="daftar-artikel" id="daftar-bencana">
		</div>
	</div>

	<?php
		if (isset($_POST['donasi'])) {
			$nama_bencana = $value['nama_bencana'];
			$query = mysqli_query($conn, "SELECT ID_BENCANA FROM DAFTAR_BENCANA WHERE NAMA_BENCANA = '$nama_bencana'");
			if ($query) {
					foreach ($query as $value) {
					$_SESSION['id_bencana'] = $value['ID_BENCANA'];
					echo "<script>alert('Donasi anda akan di proses lebih lanjut..');document.location.href = 'Ayo-donasi/ayo-donasi.php';</script>";
					}
			} else {
				echo "<script>alert('Donasi anda gagal di proses..');document.location.href = 'daftar-bencana.php';</script>";
			}
		} elseif(isset($_POST['relawan'])) {
			$nama_bencana = $value['nama_bencana'];
			$query = mysqli_query($conn, "SELECT ID_BENCANA FROM DAFTAR_BENCANA WHERE NAMA_BENCANA = '$nama_bencana'");
			if ($query) {
					foreach ($query as $value) {
					$_SESSION['id_bencana'] = $value['ID_BENCANA'];
					echo "<script>alert('Permintaan anda akan di proses lebih lanjut..');document.location.href = 'Ayo-relawan/ayo-relawan.php';</script>";
					}
			} else {
				echo "<script>alert('Donasi anda gagal di proses..');document.location.href = 'daftar-bencana.php';</script>";
			}
		}
	?>

	<div class="footer" id="footer">
		<div class="information">
			<div class="logo">
				<img src="Images/logo.png" />
			</div>
			<div class="info">
				<h2>Tentang Kami</h2>
				<p>Peduli Pedia</p>
				<p>MERAH PUTIH SQUAD</p>
			</div>
			<div class="social">
				<h2>Ikuti Kami</h2>
				 <a href="#"><img src="Images/twitter.png" /></a>
				 <a href="#"><img src="Images/FB.png" /></a>
				 <a href="#"><img src="Images/instagram.png" /></a>
			</div>
		</div>
		<div class="garis"></div>
		<div class="copyright">
			<p>&copy;Copyright MERAH PUTIH SQUAD</p>
		</div>
	</div>
	<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
	<script src = "Javascript/go-up.js"></script>
</body>
</html>