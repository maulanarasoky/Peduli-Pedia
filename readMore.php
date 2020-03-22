<?php
	include 'PHP/config.php';
	$id = $_GET['id'];
	$data = mysqli_query($conn, "SELECT judul FROM artikel WHERE id_artikel = '$id'");
	foreach($data as $value) {
		$judul = $value['judul'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?= $judul; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="Images/page-icon.png">
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<link rel="stylesheet" type="text/css" href="CSS/artikel.css">
	<script src="Ajax/artikel/artikel.js"></script>
</head>
<body onload="ambilDataArtikel(<?php echo $id; ?>);">

	<?php
		session_start();
		if(!empty($_SESSION)) {
			include 'PHP/config.php';
			$user = $_SESSION['user'];
		}
		require 'Navbar/navbar.php';
	?>

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
		<div class="description" id="artikel">
		</div>
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
					
					<button id="post">Tambahkan Komentar</button>
				</form>
			</div>
		</div>
	</div> -->

	<?php require 'Footer/footer.php'; ?>
	<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
	<script src = "Javascript/go-up.js"></script>
</body>
</html>