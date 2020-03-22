<?php
    session_start();
    if (empty($_SESSION) || count($_COOKIE) == 0) {
    	echo "<script>alert('Login dulu ya...');document.location.href='index.php';</script>";
    } elseif (!isset($_SESSION['loginRelawan'])) {
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
	<link rel="stylesheet" type="text/css" href="CSS/style-riwayat-ayo-relawan.css">
	<script type="text/javascript" src="Jquery/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="Ajax/riwayat-relawan/riwayat-relawan.js"></script>
	<script>
	$(document).ready(function(){
	  	$(".sedang-berlangsung").click(function(){
			  $("#ongoing").css({"display":"block"});
			  $("#riwayat").css({"display":"none"});

			  $(".sedang-berlangsung").css({"background":"#e52425"});
			  $(".riwayat-relawan").css({"background":"none"});

			  $(".sedang-berlangsung").css({"color":"white"});
			  $(".riwayat-relawan").css({"color":"#e52425"});
  		});
  		$(".riwayat-relawan").click(function(){
			$("#ongoing").css({"display":"none"});
			$("#riwayat").css({"display":"block"});

			$(".sedang-berlangsung").css({"background":"none"});
			$(".riwayat-relawan").css({"background":"#e52425"});

			$(".sedang-berlangsung").css({"color":"#e52425"});
			$(".riwayat-relawan").css({"color":"white"});
  		});
	});
	</script>
</head>
<body onload="sedangBerlangsung();">
	
	<?php require 'Navbar/navbar.php'; ?>

	<div class='background'>
		<div class='frame'>
			<div class='sedang-berlangsung'>
				<p>Sedang Berlangsung</p>
			</div>
			<div class='riwayat-relawan' onclick="riwayatRelawan();">
				<p>Riwayat Relawan</p>
			</div>
			<div class='red-background' id="ongoing"></div>
			<div class='red-background' id="riwayat"></div>
		</div>
	</div>

	<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
	<script src = "Javascript/go-up.js"></script>

	<?php require 'Footer/footer.php'; ?>

</body>
</html>