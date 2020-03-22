<!DOCTYPE html>
<html>
<head>
	<title>Artikel</title>
	<link rel="stylesheet" type="text/css" href="CSS/home-artikel.css">
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<link rel="icon" href="Images/page-icon.png">
	<script src="Ajax/artikel/artikel.js"></script>
</head>
<body onload="ambilData();">

	<?php
		session_start();
		if(!empty($_SESSION) && count($_COOKIE) <> 0) {
			include 'PHP/config.php';
			$user = $_SESSION['user'];
		}
		require 'Navbar/navbar.php';
	?>

	<div class="home-artikel">
		<div class="side-menu">
			<?php  
					if (empty($_SESSION) || count($_COOKIE) == 0) {
						echo "<a href='index.php'>Beranda</a><br>";
					}
					else {
						echo "<a href='home.php'>Beranda</a><br>";
					}
				?>
			<a href="tentang-kami.php">Tentang Kami</a><br>
			<a href="artikel.php">Artikel</a><br>
			<?php
				if(!empty($_SESSION) && count($_COOKIE) <> 0) {
					echo "<a href='daftar-bencana.php'>Daftar Bencana</a>";
				}
			?>
		</div>
		<div class="daftar-artikel" id="daftar-artikel">
			
		</div>
	</div>

	<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
	<script src = "Javascript/go-up.js"></script>

	<?php require 'Footer/footer.php'; ?>

</body>
</html>