<!DOCTYPE html>
<html>
<head>
	<title>Tambah Alamat</title>
	<link rel="icon" href="images/page-icon.png">
	<link rel="stylesheet" type="text/css" href="CSS/tambah_alamat.css">
	<script type="text/javascript" src="Jquery/jquery-3.3.1.min.js"></script>
	<script src="Ajax/tambah_alamat/tambah_alamat.js"></script>
	<script>
	$(document).ready(function(){
	  	$(".daftar-alamat .title button#tambah-alamat").click(function(){
		  	$(".form-tambah").css({"display":"block"});
		  	$(".form-tambah").css({"z-index":"2"});
		  	$(".whole-cover").css({"display":"block"});
		  	$("body").css({"overflow":"hidden"});
		});
		$(".whole-cover").click(function(){
		  	$(".form-tambah").css({"display":"none"});
		  	$(".form-tambah").css({"z-index":"-1"});
		  	$(".whole-cover").css({"display":"none"});
		  	$("body").css({"overflow":"scroll"});
		});
	});
	</script>
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

	<div class="daftar-alamat">
		<div class="title">
			<p id="title">Daftar Alamat</p>
			<button type="button" id="tambah-alamat">Tambah Alamat</button>
		</div>
		<div class="description" id="description">
			<table id="daftar-alamat">
				
			</table>
		</div>
	</div>

	<div class="whole-cover"></div>

	<div class="form-tambah">
		<div class="title">
			<p id="title">Tambah Alamat</p>
		</div>
			<table>
				<tr>
					<td>Nama Alamat</td>
					<td>: <input type="text" name="nama_alamat" placeholder="Nama Alamat" id="nama_alamat"></td>
				</tr>
				<tr>
					<td>Atas Nama</td>
					<td>: <input type="text" name="atas_nama" placeholder="Atas Nama" id="atas_nama"></td>
				</tr>
				<tr>
					<td>Nomor Telepon</td>
					<td>: <input type="number" name="nomor_telepon" placeholder="Telepon / Handphone" id="nomor_telepon"></td>
				</tr>
				<tr>
					<td>Provinsi</td>
					<td>: <input type="text" name="provinsi" placeholder="Provinsi" id="provinsi"></td>
				</tr>
				<tr>
					<td>Kota/Kabupaten</td>
					<td>: <input type="text" name="kota_kabupaten" placeholder="Kota / Kabupaten" id="kota_kabupaten"></td>
				</tr>
				<tr>
					<td>Kecamatan</td>
					<td>: <input type="text" name="kecamatan" placeholder="Kecamatan" id="kecamatan"></td>
				</tr>
				<tr>
					<td>Kode Pos</td>
					<td>: <input type="number" name="kode_pos" placeholder="Kode Pos" id="kode_pos"></td>
				</tr>
				<tr>
					<td>Alamat Lengkap</td>
					<td>: <input type="text" name="alamat_lengkap" placeholder="Alamat Lengkap" id="alamat_lengkap"></td>
				</tr>
				<tr>
					<td><button type="button" name="tambah" id="tambah" onclick="inputData();">Tambah</button></td>
				</tr>
			</table>
	</div>

	<div class="footer" id="tambah-alamat">
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

</body>
</html>