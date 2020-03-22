<?php
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cara Donasi</title>
	<link rel="stylesheet" type="text/css" href="CSS/style-cara-donasi.css">
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<link rel="stylesheet" type="text/css" href="CSS/responsive-style-cara-donasi.css">
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
	<div class="cara-donasi">
		<div class="side-menu">
			<a href="cara-donasi.php"><p>Cara Donasi</p></a>
			<a href="cara-relawan.php"><p>Cara Mengikuti Relawan</p></a>
			<a href="cara-kurir.php"><p>Cara Pengiriman</p></a>
		</div>
		<div class="description">
			<h1>Cara Donasi</h1>
			<div class="step">
				<img src="Images/angka/1.png"><h3>Daftar Dan Pilih Alamat</h3>
				<br>
				<br>
				<br>
				<br>
				<p id="awal">Daftarkan alamat rumah atau alamat kantor kalian. Setelah itu pilih salah satu alamat untuk dijadikan sebagai tempat penjemputan barang yang akan dilakukan oleh kurir nantinya. Alamat harus lengkap dan valid.</p>
			</div>
			<div class="step">
				<img src="Images/angka/2.png"><h3>Pilih Donasi</h3>
				<br>
				<br>
				<br>
				<br>
				<p>Pilih jenis donasi yang ingin didonasikan. Anda bisa memilih antara mendonasikan barang atau dana. Daftarkan donasi dan jumlahnya. Anda bisa menambahkan catatan untuk donasi yang telah anda berikan. Setelah itu, anda bisa memilih lokasi bencana yang ingin anda berikan atau sistem secara otomatis akan memilih lokasi bencana tersebut.</p>
			</div>
			<div class="step">
				<img src="Images/angka/3.png"><h3>Konfirmasi</h3>
				<br>
				<br>
				<br>
				<br>
				<p>Konfirmasi tentang donasi yang telah anda daftarkan sebelumnya. Pastikan semua data yang dimasukkan sudah benar. Untuk dana, kita akan berikan sebuah rekening bank untuk mengirimkan donasi yang telah anda buat sebelumnya. Jika nominal yang dikirim lebih, anda bisa melaporkannya ke pusat pelayanan kami.</p>
			</div>
			<div class="step">
				<img src="Images/angka/4.png"><h3>Tunggu Kurir Atau Pembayaran</h3>
				<br>
				<br>
				<br>
				<br>
				<p>Setelah anda melakukan konfirmasi, anda hanya perlu menunggu kurir untuk datang menjemput barang donasi. Untuk dana donasi bisa dikirimkan maksimal 3 hari setelah konfirmasi. Jika melebihi batas maksimal akan terjadi pembatalan. Untuk posisi donasi barang dapat dilihat pada tracking donasi.</p>
			</div>
		</div>
	</div>

	<?php require 'Footer/footer.php'; ?>

</body>
</html>