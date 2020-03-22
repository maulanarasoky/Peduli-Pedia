<!DOCTYPE html>
<html>
<head>
	<title>Cara Donasi</title>
	<link rel="stylesheet" type="text/css" href="CSS/style-cara-kurir.css">
	<link rel="stylesheet" type="text/css" href="CSS/responsive-style-cara-kurir.css">
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<link rel="icon" href="images/page-icon.png">
</head>
<body>

	<?php
		session_start();
		if(!empty($_SESSION) && count($_COOKIE) <> 0) {
			include 'PHP/config.php';
			$user = $_SESSION['user'];
		}
		require 'Navbar/navbar.php';
	?>

	<h1 id="help">Bantuan</h1>
	<div class="cara-kurir">
		<div class="side-menu">
			<a href="cara-donasi.php"><p>Cara Donasi</p></a>
			<a href="cara-relawan.php"><p>Cara Mengikuti Relawan</p></a>
			<a href="cara-kurir.php"><p>Cara Pengiriman</p></a>
		</div>
		<div class="description">
			<h1>Cara Pengiriman</h1>
			<div class="step">
				<img src="Images/angka/1.png"><h3>Pilih Donasi dari Donatur</h3>
				<br>
				<br>
				<br>
				<br>
				<p id="awal">Pilih donasi yang muncul setelah donatur telah mendaftarkan donasinya. Anda bisa memilih donasi sesuai dengan tempat domisili Anda. Pengambilan donasi dapat dilakukan di halaman <a href="list-donasi.php">List Donasi</a>.</p>
			</div>
			<div class="step">
				<img src="Images/angka/2.png"><h3>Laporkan Status Donasi</h3>
				<br>
				<br>
				<br>
				<br>
				<p>Kurir wajib melaporkan status donasi. Hal ini demi kenyamanan donatur dalam mendonasikan barangnya. Status donasi harus disertai dengan bukti gambar secara langsung, bukan mengada - ngada.</p>
			</div>
			<div class="step">
				<img src="Images/angka/3.png"><h3>Setelah Pengiriman</h3>
				<br>
				<br>
				<br>
				<br>
				<p>Setelah pengiriman telah sampai tujuan, anda dapat memberikan status "Telah Dikirim". Status akan masuk ke notifikasi donatur dan akan diselesaikan oleh donatur.</p>
			</div>
		</div>
	</div>

	<?php require 'Footer/footer.php'; ?>

</body>
</html>