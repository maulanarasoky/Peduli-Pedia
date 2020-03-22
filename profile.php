<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/page-icon.png">
	<link rel="stylesheet" type="text/css" href="CSS/style-profile.css">
	<script type="text/javascript" src="Ajax/profile/profile.js"></script>
	<script type="text/javascript" src="Jquery/jquery-3.3.1.min.js"></script>
	<script>
	</script>
</head>
<body onload="ambilData();" id="body">

		<?php
		session_start();
			if (empty($_SESSION) || count($_COOKIE) == 0) {
				echo "<script>alert('Login dulu ya...');document.location.href='index.php';</script>";
			}
			require 'PHP/config.php';
			$user = $_SESSION['user'];
			require 'Navbar/navbar.php';
		?>
		
		<div id="profile"></div>

		<div class="whole-cover" id="whole-cover"></div>

		<div class="form-tambah" id="form-tambah">
		</div>

	<div class="footer" id="profile">
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