<!DOCTYPE html>
<html>
<head>
	<title>Cara Donasi</title>
	<link rel="stylesheet" type="text/css" href="CSS/style-cara-relawan.css">
	<link rel="stylesheet" type="text/css" href="CSS/responsive-style-cara-relawan.css">
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
	<div class="cara-relawan">
		<div class="side-menu">
			<a href="cara-donasi.php"><p>Cara Donasi</p></a>
			<a href="cara-relawan.php"><p>Cara Mengikuti Relawan</p></a>
			<a href="cara-kurir.php"><p>Cara Pengiriman</p></a>
		</div>
		<div class="description">
			<h1>Cara Mengikuti Relawan</h1>
			<div class="step">
				<img src="Images/angka/1.png"><h3>Daftar dan Pilih Alamat</h3>
				<br>
				<br>
				<br>
				<br>
				<p id="awal">Daftarkan alamat rumah atau alamat kantor kalian. Setelah itu pilih salah satu alamat untuk mendapatkan informasi relawan yang akan mengikuti bantuan. Alamat harus lengkap dan juga valid.</p>
			</div>
			<div class="step">
				<img src="Images/angka/2.png"><h3>Pilih Bencana</h3>
				<br>
				<br>
				<br>
				<br>
				<p>Pilih bencana yang sedang terjadi di Indonesia. Anda dapat memilih bencana yang ingin Anda bantu. Anda juga dapat melihat daftar bencana di bagian artikel. Untuk waktu akan disesuaikan oleh kami.</p>
			</div>
			<div class="step">
				<img src="Images/angka/3.png"><h3>Konfirmasi</h3>
				<br>
				<br>
				<br>
				<br>
				<p>Konfirmasi tentang data diri dan jadwal. Anda harus menyetujui semua peraturan dan ketentuan yang berlaku saat menjadi relawan.</p>
			</div>
		</div>
	</div>

	<?php require 'Footer/footer.php'; ?>

</body>
</html>