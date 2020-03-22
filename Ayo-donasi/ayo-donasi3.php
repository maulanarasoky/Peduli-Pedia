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
	<script type="text/javascript" src="../Ajax/ayo_donasi/ayo_donasi_3/ayo_donasi.js"></script>
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
					<img src="../Images/angka/3.png" alt="3">
					<div class="tulisan">
						<p id="pilih">Konfirmasi</p>
					</div>
				</li>
				<li>
					<img src="../Images/angka/black-4.png" alt="4">
					<div class="tulisan">
						<p>Tunggu Kurir/Pembayaran</p>
					</div>
				</li>
			</ul>
		</div>


		<?php
			$barang = mysqli_query($conn, "SELECT * FROM DONASI_BARANG WHERE ID_DONATUR = (SELECT ID_DONATUR FROM DONATUR WHERE USERNAME = '$user')");
			$uang = mysqli_query($conn, "SELECT * FROM DONASI_UANG WHERE ID_DONATUR = (SELECT ID_DONATUR FROM DONATUR WHERE USERNAME = '$user')");
			if(isset($_SESSION['barang']) == true) {
				$nama_barang = $_SESSION['namaBarang'];
				$jumlah = $_SESSION['jumlah'];
				$catatan_barang = $_SESSION['catatan_barang'];
				$gambar = $_SESSION['gambar_bencana'];
				$nama_bencana = $_SESSION['nama_bencana'];

					echo "<div class='whole'>
						<div class='donasii'>
							<div class='result'>
								
								<p id='judul_namaBarang'>Nama Barang : </p><p id='namaBarang'>" . $nama_barang . "</p>
								<p id='judulJumlah'>Jumlah : </p><p id='jumlah' class = 'right'>" . $jumlah . "</p>
								<p>Catatan : </p><p id='catatan'>" . $catatan_barang . "</p>
								<div class='garis'></div>
								<div class='daftar-bencana'>
									<img src='" . $gambar . "'><p>" . $nama_bencana . "</p>
								</div>
							</div>
						</div>
					</div>
					<button type='button' id='next' name='next' onclick='donasiBarang();'>Selanjutnya</button>";
			} elseif(isset($_SESSION['donasi-uang']) == true) {
				$nominal = $_SESSION['nominal'];
				$bank = $_SESSION['bank'];
				$catatan = ucwords(strtolower($_SESSION['catatan']));
				$gambar = $_SESSION['gambar_bencana'];
				$nama_bencana = $_SESSION['nama_bencana'];

				echo "<div class='whole'>
						
						<div class='donasii-uang'>
								<div class='result'>
									<p>Nominal : </p>
									<p id='nominal'>" . $nominal . "</p>
									<p>Bank : </p>
									<p id='bank'>" . $bank . "</p>
									<p id='right'>Catatan : </p>
									<p id='catatan'>" . $catatan . "</p>
								<div class='garis'></div>
									<div class='daftar-bencana'>
										<img src='" . $gambar . "'><p>" . $nama_bencana . "</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<button type='button' id='next' name='next' onclick='donasiUang()'>Selanjutnya</button>";
			}
		?>
				
        <button type ="button" id="backk" name="back" onclick="document.location.href='ayo-donasi2.php';">Kembali</button>
</body>
</html>