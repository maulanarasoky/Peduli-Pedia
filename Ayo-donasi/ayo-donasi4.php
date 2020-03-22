<!DOCTYPE html>
<?php
session_start();
    if (empty($_SESSION) || count($_COOKIE) == 0) {
         echo "<script>alert('Login dulu ya..');document.location.href='../index.php';</script>";
    }elseif (!isset($_SESSION['id_bencana'])) {
        	echo "<script>document.location.href='../daftar-bencana.php';</script>";
    }elseif (!isset($_SESSION['loginDonatur'])) {
		echo "<script>alert('Access Denied..');document.location.href='../index.php';</script>";
	}
    require '../PHP/config.php';
	$user = $_SESSION['user'];
?>
<html>
<head>
	<title>Ayo Donasi</title>
	<link rel="stylesheet" type="text/css" href="../CSS/style-donasi.css">
	<link rel="icon" href="../Images/page-icon.png">
	<script type="text/javascript" src="../Ajax/ayo_donasi/ayo_donasi_4/update_poin.js"></script>
	<script type="text/javascript" src="../Jquery/jquery-3.3.1.min.js"></script>
	<script>
	$(document).ready(function(){
	  	$(".back-title").click(function(){
		  	$(".donasii").css({"display":"block"});
		  	$(".donasii-uang").css({"display":"none"});
		  	$(".back-title").css({"background-color":"#e52425"});
		  	$(".back-title p#title").css({"color":"white"});
		  	$(".back-titlee").css({"background":"rgb(228, 228, 228)"});
		  	$(".back-titlee p#titlee").css({"color":"#e52425"});
  		});
  		$(".back-titlee").click(function(){
  			$(".donasii").css({"display":"none"});
		  	$(".donasii-uang").css({"display":"block"});
		  	$(".back-title").css({"background":"rgb(228, 228, 228)"});
		  	$(".back-title p#title").css({"color":"#e52425"});
		  	$(".back-titlee").css({"background-color":"#e52425"});
		  	$(".back-titlee p#titlee").css({"color":"white"});
  		});
	  });
	</script>
</head>
<body>

	<div class="navbar-logo">
		<div class="logo">
			<a href="../home.php" id="home"><img src="../Images/logo.png" /></a>
		</div>
		<div class="user">
			<?php 
				if (isset($_SESSION['loginDonatur']) == true) {
					$nama = mysqli_query($conn, "SELECT NAMA FROM DONATUR WHERE USERNAME = '$user'");
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
					<img src="../Images/angka/black-1.png" alt="1">
					<div class="tulisan">
						<p>Daftar Alamat</p>
					</div>
				</li>
				<li>
					<img src="../Images/angka/black-2.png" alt="2">
					<div class="tulisan">
						<p>Pilih Donasi</p>
					</div>
				</li>
				<li>
					<img src="../Images/angka/black-3.png" alt="3">
					<div class="tulisan">
						<p>Konfirmasi</p>
					</div>
				</li>
				<li>
					<img src="../Images/angka/4.png" alt="4">
					<div class="tulisan">
						<p id="pilih">Tunggu Kurir/Pembayaran</p>
					</div>
				</li>
			</ul>
		</div>

		<div class="whole">
			
			<?php
				if (isset($_SESSION['barang']) == true) {
					echo "<div class='valid'>
						<h1 id='keteranganBarang'>Mohon tunggu kurir akan menjemput donasi anda</h1>
					</div>";
				} elseif (isset($_SESSION['donasi-uang']) == true) {
					echo "<div class='valid'>
							<div class='isi'>
								<h1 id='keterangann'>Donasi Anda dapat dikirim melalui :</h1>
								<h1 id='bank'>" . $_SESSION['bank'] . "</h1>
								<h1 id='norek'>022 11475 XXXX</h1>
							</div>
						</div>";
				}
			?>
		</div>


		<button id="back" name="back" onclick="alert('Anda harus menyelesaikan transaksi terlebih dahulu..');">Kembali</button>
		<button type="button" id="nextt" name="next" onclick="updatePoin();">Selesai</button>
	</div>

	<?php

		if (isset($_POST['send'])) {
			if (!empty($_POST['bukti'])) {
				$bukti = $_POST['bukti'];
				$id_don = mysqli_query($conn, "SELECT ID_DONATUR FROM DONATUR WHERE USERNAME = '$user'");
				foreach ($id_don as $value) {
					$id_donatur = $value['ID_DONATUR'];
				$insertTransfer = mysqli_query($conn, "INSERT INTO TRANSFER_UANG (BUKTI_TRANSFER, ID_DONASI_UANG) VALUES('$bukti', (SELECT ID_DONASI_UANG FROM DONASI_UANG WHERE ID_DONATUR = '$id_donatur'))");
				}
				if ($insertTransfer) {
					echo "<script>alert('Bukti telah terkirim..');document.location.href = 'home.php';</script>";
				} else {
					echo "<script>alert('Bukti gagal terkirim..');document.location.href = 'ayo-donasi4.php';</script>";
				}
			} else {
				echo "<script>alert('Silahkan kirimkan terlebih dahulu bukti pembayaran Anda..');document.location.href = 'ayo-donasi4.php';</script>";
			}
		}

	?>

	<?php
		unset($_SESSION['id_bencana']);
		unset($_SESSION['nama_bencana']);
		unset($_SESSION['gambar_bencana']);
		unset($_SESSION['barang']);
		unset($_SESSION['donasi_uang']);
	?>
	

</body>
</html>