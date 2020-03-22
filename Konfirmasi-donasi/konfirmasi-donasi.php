<?php
    session_start();
    if (empty($_SESSION) || count($_COOKIE) == 0) {
    	echo "<script>alert('Login dulu ya...');document.location.href='index.php';</script>";
    } elseif (!isset($_SESSION['panitia'])) {
    	echo "<script>alert('Access Denied...');document.location.href='home.php';</script>";
    }
    	require '../PHP/config.php';
		$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
	<title>Peduli Pedia</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../Images/page-icon.png">
	<link rel="stylesheet" type="text/css" href="../CSS/style.css">
	<link rel="stylesheet" type="text/css" href="../CSS/style-konfirmasi-donasi.css">
	<script src="../Ajax/konfirmasi-donasi/konfirmasi-donasi.js"></script>
	<script type="text/javascript" src="../Jquery/jquery-3.3.1.min.js"></script>
	<script>
	$(document).ready(function(){
	  	$(".back-title").click(function(){
	  		$(".background").css({"display":"block"});
	  		$(".backgroundd").css({"display":"none"});
	  		$(".list-donasii").css({"display":"block"});
		  	$(".list-pengiriman").css({"display":"none"});
		  	$(".back-title").css({"background-color":"#e52425"});
		  	$(".back-title p#title").css({"color":"white"});
		  	$(".back-titlee").css({"background":"rgb(228, 228, 228)"});
		  	$(".back-titlee p#titlee").css({"color":"#e52425"});
		  	$(".back-titleee").css({"background":"rgb(228, 228, 228)"});
		  	$(".back-titlee p#titleee").css({"color":"#e52425"});
  		});
  		$(".back-titlee").click(function(){
  			$(".background").css({"display":"none"});
  			$(".backgroundd").css({"display":"block"});
			$(".list-donasii").css({"display":"none"});
		  	$(".list-pengiriman").css({"display":"block"});
		  	$(".back-title").css({"background-color":"rgb(228, 228, 228)"});
		  	$(".back-title p#title").css({"color":"#e52425"});
		  	$(".back-titlee").css({"background":"#e52425"});
		  	$(".back-titlee p#titlee").css({"color":"white"});
		  	$(".back-titleee").css({"background":"rgb(228, 228, 228)"});
		  	$(".back-titlee p#titleee").css({"color":"#e52425"});
  		});
  		$(".back-titleee").click(function(){
  			$(".list-pengiriman").css({"display":"none"});
		  	$(".donasi-uang").css({"display":"block"});
		  	$(".back-title").css({"background":"rgb(228, 228, 228)"});
		  	$(".back-title p#title").css({"color":"#e52425"});
		  	$(".back-titlee").css({"background":"rgb(228, 228, 228)"});
		  	$(".back-titlee p#titlee").css({"color":"#e52425"});
		  	$(".back-titleee").css({"background-color":"#e52425"});
		  	$(".back-titleee p#titleee").css({"color":"white"});
  		});
	});
	</script>
</head>
<body onload="ambilData();">
	
	<div class="navbar-logo">
		<div class="logo">
			<a href="../home.php" id="home"><img src="../Images/logo.png" /></a>
		</div>
		<div class="user">
			<?php 
				if (isset($_SESSION['loginPanitia']) == true) {
					$nama = mysqli_query($conn, "SELECT NAMA, EMAIL FROM PANITIA WHERE USERNAME = '$user'");
						foreach ($nama as $value) {
							echo "<a href='profile.php' id='user'><img src='../Images/user.png'><p id='user'>" . $value['NAMA'] . '</p></a>';
						}
				}
			?>
		</div>
	</div>

	<div class='background'>
		<div class='frame'>
			<div class='list-donasii' id="pilih-donasi">
				<h1 id='title'>List Donasi</h1>
			</div>
		</div>
	</div>

	<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
	<script src = "Javascript/go-up.js"></script>

	<div class="footer" id="footer">
		<div class="information">
			<div class="logo">
				<img src="../Images/logo.png" />
			</div>
			<div class="info">
				<h2>Tentang Kami</h2>
				<p>Peduli Pedia</p>
				<p>MERAH PUTIH SQUAD</p>
			</div>
			<div class="social">
				<h2>Ikuti Kami</h2>
				 <a href="#"><img src="../Images/twitter.png" /></a>
				 <a href="#"><img src="../Images/FB.png" /></a>
				 <a href="#"><img src="../Images/instagram.png" /></a>
			</div>
		</div>
		<div class="garis"></div>
		<div class="copyright">
			<p>&copy;Copyright MERAH PUTIH SQUAD</p>
		</div>
	</div>

</body>
</html>