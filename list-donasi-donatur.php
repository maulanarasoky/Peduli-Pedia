<?php
    session_start();
    if (empty($_SESSION) || count($_COOKIE) == 0) {
    	echo "<script>alert('Login dulu ya...');document.location.href='index.php';</script>";
    } elseif (!isset($_SESSION['loginDonatur'])) {
    	echo "<script>alert('Access Denied...');document.location.href='home.php';</script>";
    }
    	require 'PHP/config.php';
		$user = $_SESSION['user'];
		mysqli_query($conn, "UPDATE kurir SET status = 'Online' WHERE username='$user'");
?>
<!DOCTYPE html>
<html lang="id">
<head>
	<title>Peduli Pedia</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/page-icon.png">
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<link rel="stylesheet" type="text/css" href="CSS/style-list-donasi-donatur.css">
	<script type="text/javascript" src="Ajax/list-donasi-donatur/list-donasi-donatur.js"></script>
	<script type="text/javascript" src="Jquery/jquery-3.3.1.min.js"></script>
	<script>
	$(document).ready(function(){
	  	$(".back-title").click(function(){
			$(".list-donasi").css({"display":"block"});
			$(".list-riwayat").css({"display":"none"});

			$(".back-title").css({"background":"#e52425"});
			$(".back-titlee").css({"background":"none"});

			$(".back-title").css({"color":"white"});
			$(".back-titlee").css({"color":"#e52425"});
  		});
  		$(".back-titlee").click(function(){
			$(".list-donasi").css({"display":"none"});
			$(".list-riwayat").css({"display":"block"});

			$(".back-title").css({"background":"none"});
			$(".back-titlee").css({"background":"#e52425"});

			$(".back-title").css({"color":"#e52425"});
			$(".back-titlee").css({"color":"white"});
  		});
	});
	</script>
</head>
<body onload="ambilDonasi();">
	
	<div class="navbar-logo">
		<div class="logo">
			<a href="home.php" id="home"><img src="Images/logo.png" /></a>
		</div>
		<div class="user">
			<?php 
				if (isset($_SESSION['loginDonatur']) == true) {
					$nama = mysqli_query($conn, "SELECT NAMA, EMAIL FROM DONATUR WHERE USERNAME = '$user'");
						foreach ($nama as $value) {
							$explode = explode(' ', $value['NAMA']);
							echo "<a href='profile.php' id='user'><img src='Images/user.png'><p id='user'>" . $explode[0] . '</p></a>';
						}
				}
			?>
		</div>
	</div>

	<div class="background">
		<div class="frame">
			<div class="back-title">
				<p id="title">Donasi</p>
			</div>
			<div class="back-titlee" onclick="daftarRiwayat();">
				<p id="titlee">Riwayat</p>
			</div>
			<div class="list-donasi" id="list-donasiku">
			</div>
			<div class='list-riwayat' id="list-riwayat">
			</div>
		</div>
	</div>

	<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
	<script src = "Javascript/go-up.js"></script>

	<?php require 'Footer/footer.php'; ?>

</body>
</html>