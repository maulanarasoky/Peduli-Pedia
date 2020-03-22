<?php
    session_start();
    if (empty($_SESSION) || count($_COOKIE) == 0) {
    	echo "<script>alert('Login dulu ya...');document.location.href='index.php';</script>";
    } elseif (!isset($_SESSION['loginKurir'])) {
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
	<link rel="stylesheet" type="text/css" href="CSS/style-list-donasi.css">
	<script src="Ajax/list-donasi/list-donasi.js"></script>
	<script type="text/javascript" src="Jquery/jquery-3.3.1.min.js"></script>
	<script>
	$(document).ready(function(){
	  	$(".back-title").click(function(){
	  		$("#pilih-donasi").css({"display":"block"});
			$("#daftar-pickup").css({"display":"none"});
			$("#riwayat-pickup").css({"display":"none"});

			$(".back-title").css({"background":"#e52425"});
			$(".back-titlee").css({"background":"none"});
			$(".back-titleee").css({"background":"none"});

			$(".back-title").css({"color":"white"});
			$(".back-titlee").css({"color":"#e52425"});
			$(".back-titleee").css({"color":"#e52425"});
  		});
  		$(".back-titlee").click(function(){
			$("#pilih-donasi").css({"display":"none"});
			$("#daftar-pickup").css({"display":"block"});
			$("#riwayat-pickup").css({"display":"none"});

			$(".back-title").css({"background":"none"});
			$(".back-titlee").css({"background":"#e52425"});
			$(".back-titleee").css({"background":"none"});

			$(".back-title").css({"color":"#e52425"});
			$(".back-titlee").css({"color":"white"});
			$(".back-titleee").css({"color":"#e52425"});
  		});
  		$(".back-titleee").click(function(){
			$("#pilih-donasi").css({"display":"none"});
			$("#daftar-pickup").css({"display":"none"});
			$("#riwayat-pickup").css({"display":"block"});

			$(".back-title").css({"background":"none"});
			$(".back-titlee").css({"background":"none"});
			$(".back-titleee").css({"background":"#e52425"});
			
			$(".back-title").css({"color":"#e52425"});
			$(".back-titlee").css({"color":"#e52425"});
			$(".back-titleee").css({"color":"white"});
  		});
	});
	</script>
</head>
<body onload="ambilData();">
	
	<div class="navbar-logo">
		<div class="logo">
			<a href="home.php" id="home"><img src="Images/logo.png" /></a>
		</div>
		<div class="user">
			<?php 
				if (isset($_SESSION['loginKurir']) == true) {
					$nama = mysqli_query($conn, "SELECT NAMA, EMAIL FROM KURIR WHERE USERNAME = '$user'");
						foreach ($nama as $value) {
							$explode = explode(' ', $value['NAMA']);
							echo "<a href='profile.php' id='user'><img src='Images/user.png'><p id='user'>" . $explode[0] . '</p></a>';
						}
				}
			?>
		</div>
	</div>

	<div class='background'>
		<div class='frame'>
			<div class='back-title'>
				<p id='title'>Donasi</p>
			</div>
			<div class='back-titlee' onclick="ambilPickUp();">
				<p id='titlee'>Kirimanku</p>
			</div>
			<div class='back-titleee' onclick="riwayatPickUp();">
				<p id='titleee'>Riwayat</p>
			</div>
			<div class='list-donasii' id="pilih-donasi">
			</div>
			<div class='list-donasii' id="daftar-pickup">
			</div>
			<div class='list-donasii' id="riwayat-pickup">
			</div>
		</div>
	</div>


	<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
	<script src = "Javascript/go-up.js"></script>

	<?php require 'Footer/footer.php'; ?>

</body>
</html>