<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/page-icon.png">
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<link rel="stylesheet" type="text/css" href="CSS/tentang-kami.css">
	<script type="text/javascript" src="Jquery/jquery-3.3.1.min.js"></script>
</head>
<body>

		<?php
			session_start();
			if (!empty($_SESSION) && count($_COOKIE) <> 0) {
				require 'PHP/config.php';
				$user = $_SESSION['user'];
			}
			require 'Navbar/navbar.php';
		?>

	<h1 id="judul-artikel">Tentang Kami</h1>

	<div class="artikel">
		<div class="sideMenu">
			<ul>
				<?php  
					if (empty($_SESSION) || count($_COOKIE) == 0) {
						echo "<li><a href='index.php'>Beranda</a></li>";
						
					}
					else {
						echo "<li><a href='home.php'>Beranda</a></li>";
						
					}
				?>
				<li><a href="tentang-kami.php">Tentang Kami</a></li>
				<li><a href="artikel.php">Artikel</a></li>
			</ul>
		</div>
		<div class="description" id="us">
			<h1 id="title">MERAH PUTIH SQUAD</h1>
			<p id="us">
				MERAH PUTIH SQUAD adalah sebuah tim yang terbentuk oleh 3 orang mahasiswa keren dari 
				Telkom University Bandung. Mereka adalah mahasiswa D3 RPLA (Rekayasa Perangkat Lunak Aplikasi) 
				yang memiliki tujuan yang sama, yaitu untuk membantu orang banyak. Mereka tergugah oleh keadaan Indonesia 
				tercinta ini yang sedang tertimpa bencana alam. Sebagai jiwa pemuda mereka ingin membantu saudara - saudara
				setanah air.
			</p>
		</div>
		<div class="founder">
			<i><h1 id="founder">Founder Peduli Pedia</h1></i>
			<a href="#"><div class="designer" id="founder">
				<img src="Images/designer.jpg" id="designer">
				<h3 id="designer">Designer</h3>
				<p id="designer">Mohammad Andiez</p>
			</div></a>
			<a href="#"><div class="leader" id="founder">
				<img src="Images/leader.jpg" id="leader">
				<h3 id="leader">Leader</h3>
				<p id="leader">Muhammad Arifin</p>
			</div></a>
			<a href="#"><div class="programmer" id="founder">
				<img src="Images/programmer.jpg" id="programmer">
				<h3 id="programmer">Software Engineer</h3>
				<p id="programmer">Maulana Rasoky Nasution</p>
			</div></a>
		</div>
		<p id="bawah">Kami Terdiri dari 3 orang hebat yang siap membantu untuk indonesia tercinta</p>
		<img src="Images/we-are.jpg" id="bawah">
	</div>
	<!-- <div class="comment">
		<div class="comment-coloumn">
			<div class="navbar-comment">
				<p>Komentar</p>
				<div class="garis"></div>
			</div>
			<div class="comment-box">
				<div class="user-comment">
					<img src="">
					<p id="name"></p>
					<p id="comment"></p>
				</div>
			</div>
			<div class="new-comment">
				<form>
					<textarea placeholder="Comment goes here..."></textarea>
				</form>
				<button id="post" name="post">Tambahkan Komentar</button>
			</div>
		</div>
	</div> -->

	<div class="footer" id="footer">
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
	<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
	<script src = "Javascript/go-up.js"></script>
</body>
</html>