<?php
    session_start();
    if (empty($_SESSION) || count($_COOKIE) == 0) {
    	header('Location: index.php');
    }
    	require 'PHP/config.php';
		$user = $_SESSION['user'];
		if(isset($_SESSION['loginDonatur']) == true) {
			$query = mysqli_query($conn, "UPDATE DONATUR SET status = 'Online' WHERE USERNAME='$user'");
		} elseif(isset($_SESSION['loginRelawan']) == true) {
			$query = mysqli_query($conn, "UPDATE RELAWAN SET status = 'Online' WHERE USERNAME='$user'");
		} elseif(isset($_SESSION['loginKurir']) == true) {
			$query = mysqli_query($conn, "UPDATE KURIR SET status = 'Online' WHERE USERNAME='$user'");
		} elseif(isset($_SESSION['loginPanitia']) == true) {
			$query = mysqli_query($conn, "UPDATE PANITIA SET status = 'Online' WHERE USERNAME='$user'");
		}
?>
<!DOCTYPE html>
<html lang="id">
<head>
	<title>Peduli Pedia</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/page-icon.png">
	<link rel="stylesheet" type="text/css" href="CSS/home.css">
	<link rel="stylesheet" type="text/css" href="CSS/responsive-home.css">
	<script type="text/javascript" src="Jquery/jquery-3.3.1.min.js"></script>
	<script>
	$(document).ready(function(){
		$(".navbar-menu ul#welcome li#profile button").click(function(){
			$(".menu").toggle('slow');
  		});
		$(".picture").click(function(){
			$(".menu").css({"display":"none"});
		});
		$(".grade .title p#week").click(function(){
			$(".winner#week").css({"display":"block"});
			$(".winner#month").css({"display":"none"});
			$(".my-grade#week").css({"display":"block"});
			$(".my-grade#month").css({"display":"none"});

			$(".grade .title p#week").css({"color":"blue"});
			$(".grade .title .garis#week").css({"background":"blue"});
			$(".grade .title .garis#week").css({"border":"1px solid blue"});

			$(".grade .title p#month").css({"color":"#e52425"});
			$(".grade .title .garis#month").css({"background":"#e52425"});
			$(".grade .title .garis#month").css({"border":"1px solid #e52425"});
		});
		$(".grade .title p#month").click(function(){
			$(".winner#week").css({"display":"none"});
			$(".winner#month").css({"display":"block"});
			$(".my-grade#week").css({"display":"none"});
			$(".my-grade#month").css({"display":"block"});

			$(".grade .title p#week").css({"color":"#e52425"});
			$(".grade .title .garis#week").css({"background":"#e52425"});
			$(".grade .title .garis#week").css({"border":"1px solid #e52425"});

			$(".grade .title p#month").css({"color":"blue"});
			$(".grade .title .garis#month").css({"background":"blue"});
			$(".grade .title .garis#month").css({"border":"1px solid blue"});
		  });
		  $(".grade button#donatur").click(function(){
		  	$(".grade button#donatur").css({"background-color":"white"});
		  	$(".grade button#donatur").css({"color":"#e52425"});
		  	$(".grade button#donatur").css({"border":"1px solid #e52425"});

		  	$(".grade button#relawan").css({"background-color":"#e52425"});
		  	$(".grade button#relawan").css({"color":"white"});
		  	$(".grade button#relawan").css({"border":"1px solid #e52425"});

		  	$(".grade button#kurir").css({"background-color":"#e52425"});
		  	$(".grade button#kurir").css({"color":"white"});
		  	$(".grade button#kurir").css({"border":"1px solid #e52425"});

		  	$(".grade-donatur").css({"display":"block"});
		  	$(".grade-relawan").css({"display":"none"});
		  	$(".grade-kurir").css({"display":"none"});

		  	$(".grade-donatur .potrait#donatur").css({"display":"block"});
		  	$(".grade-donatur .landscape#donatur").css({"display":"block"});
		  	$(".grade-relawan .potrait#relawan").css({"display":"none"});
		  	$(".grade-relawan .landscape#relawan").css({"display":"none"});
		  	$(".grade-kurir .potrait#kurir").css({"display":"none"});
		  	$(".grade-kurir .landscape#kurir").css({"display":"none"});

  		});
  		$(".grade button#relawan").click(function(){
		  	$(".grade button#donatur").css({"background-color":"#e52425"});
		  	$(".grade button#donatur").css({"color":"white"});
		  	$(".grade button#donatur").css({"border":"1px solid #e52425"});

		  	$(".grade button#relawan").css({"background-color":"white"});
		  	$(".grade button#relawan").css({"color":"#e52425"});
		  	$(".grade button#relawan").css({"border":"1px solid #e52425"});

		  	$(".grade button#kurir").css({"background-color":"#e52425"});
		  	$(".grade button#kurir").css({"color":"white"});
		  	$(".grade button#kurir").css({"border":"1px solid #e52425"});

		  	$(".grade-donatur").css({"display":"none"});
		  	$(".grade-relawan").css({"display":"block"});
		  	$(".grade-kurir").css({"display":"none"});

		  	$(".grade-donatur .potrait#donatur").css({"display":"none"});
		  	$(".grade-donatur .landscape#donatur").css({"display":"none"});
		  	$(".grade-relawan .potrait#relawan").css({"display":"block"});
		  	$(".grade-relawan .landscape#relawan").css({"display":"block"});
		  	$(".grade-kurir .potrait#kurir").css({"display":"none"});
		  	$(".grade-kurir .landscape#kurir").css({"display":"none"});
  		});
  		$(".grade button#kurir").click(function(){
		  	$(".grade button#donatur").css({"background-color":"#e52425"});
		  	$(".grade button#donatur").css({"color":"white"});
		  	$(".grade button#donatur").css({"border":"1px solid #e52425"});

		  	$(".grade button#relawan").css({"background-color":"#e52425"});
		  	$(".grade button#relawan").css({"color":"white"});
		  	$(".grade button#relawan").css({"border":"1px solid #e52425"});

		  	$(".grade button#kurir").css({"background-color":"white"});
		  	$(".grade button#kurir").css({"color":"#e52425"});
		  	$(".grade button#kurir").css({"border":"1px solid #e52425"});

		  	$(".grade-donatur").css({"display":"none"});
		  	$(".grade-relawan").css({"display":"none"});
		  	$(".grade-kurir").css({"display":"block"});

		  	$(".grade-donatur .potrait#donatur").css({"display":"none"});
		  	$(".grade-donatur .landscape#donatur").css({"display":"none"});
		  	$(".grade-relawan .potrait#relawan").css({"display":"none"});
		  	$(".grade-relawan .landscape#relawan").css({"display":"none"});
		  	$(".grade-kurir .potrait#kurir").css({"display":"block"});
		  	$(".grade-kurir .landscape#kurir").css({"display":"block"});
  		});    
	});
	</script>
</head>
<body>
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
				} elseif (isset($_SESSION['loginRelawan']) == true) {
					$nama = mysqli_query($conn, "SELECT NAMA, EMAIL FROM RELAWAN WHERE USERNAME = '$user'");
						foreach ($nama as $value) {
							$explode = explode(' ', $value['NAMA']);
							echo "<a href='profile.php' id='user'><p id='user'>" . $explode[0] . "</p><img src='Images/user.png'></a>";
						}
				} elseif (isset($_SESSION['loginKurir']) == true) {
					$nama = mysqli_query($conn, "SELECT NAMA, EMAIL FROM KURIR WHERE USERNAME = '$user'");
						foreach ($nama as $value) {
							$explode = explode(' ', $value['NAMA']);
							echo "<a href='profile.php' id='user'><img src='Images/user.png'><p id='user'>" . $explode[0] . '</p></a>';
						}
				} elseif (isset($_SESSION['loginPanitia']) == true) {
					$nama = mysqli_query($conn, "SELECT NAMA, EMAIL FROM PANITIA WHERE USERNAME = '$user'");
						foreach ($nama as $value) {
							$explode = explode(' ', $value['NAMA']);
							echo "<a href='#' id='user'><img src='Images/user.png'><p id='user'>" . $explode[0] . '</p></a>';
						}
				}
			?>
		</div>
	</div>
	<div class="navbar-menu">
		<ul id="welcome">
			<li><a href="home.php">Beranda</a></li>
			<li><a href="tentang-kami.php">Tentang Kami</a></li>
			<li><a href="artikel.php">Artikel</a></li>
			<li><a href="bantuan.php">Bantuan</a></li>
			<?php 
				if (isset($_SESSION['loginDonatur']) == true) {
					echo "<li><a href='Ayo-donasi/ayo-donasi.php'>Ayo Donasi</a></li>";
				} elseif (isset($_SESSION['loginKurir']) == true) {
					echo "<li><a href='list-donasi.php'>List Donasi</a></li>";
				} elseif (isset($_SESSION['loginRelawan']) == true) {
					echo "<li><a href='Ayo-relawan/ayo-relawan.php'>Ayo Ikut Relawan</a></li>";
				}
			?>
			<li id="profile"><button>Profil</button></li>
		</ul>
	</div>

	<div class="menu">
		<div class="profilku">
			<p><a href="profile.php">Profilku</a></p>
		</div>
		<?php
			if(isset($_SESSION['loginDonatur']) == true) {
				echo "<div class='list-donasi'>
						<p><a href='list-donasi-donatur.php'>List Donasi</a></p>
					</div>";
			}elseif(isset($_SESSION['loginRelawan']) == true) {
				echo "<div class='list-donasi'>
						<p><a href='riwayat_ayo_relawan.php'>Riwayat Relawan</a></p>
					</div>";
			}elseif(isset($_SESSION['panitia']) == true) {
				echo "<div class='list-donasi'>
						<p><a href='Konfirmasi-donasi/konfirmasi-donasi.php'>Konfirmasi Donasi</a></p>
					</div>
					<div class='list-donasi'>
						<p><a href='Konfirmasi-relawan/konfirmasi-relawan.php'>Konfirmasi Relawan</a></p>
					</div>";
			}
		?>
		<div class="keluar">
			<p><a href="logout.php">Keluar</a></p>
		</div>
	</div>

	<div class="slideshow-container">
		<div class="mySlides fade">
  			<img src="Images/artikel-1.jpg">
		</div>

		<div class="mySlides fade">
  			<img src="Images/artikel-2.jpg">
		</div>

		<div class="mySlides fade">
  			<img src="Images/artikel-3.jpg">
		</div>
	</div>

	<div class="titik">
  		<span class="dot"></span> 
  		<span class="dot"></span> 
  		<span class="dot"></span> 
	</div>

	<script src = "Javascript/slideshow.js"></script>

	<?php
		require 'PHP/config.php';
		$query = mysqli_query($conn, "SELECT id_donatur, nama FROM donatur ORDER BY POIN DESC LIMIT 8");
		$array = array();
		$index = 0;
		foreach($query as $data) {
			$array[$index]['nama'] = $data['nama'];
			$array[$index]['id_donatur'] = $data['id_donatur'];
			$index++;
		}
	?>

	<div class="best">
		<div class="grade">
			<button id="donatur" class="active">Donatur</button>
			<button id="relawan">Relawan</button>
			<button id="kurir">Kurir</button>
		</div>
		<div class="grade-donatur">
			<table>
				<tr>
					<td colspan="2" id="donatur">Donatur</td>
				</tr>
				<tr>
					<td>1.</td>
					<td><?= $array[0]['nama'] . ' ( ' . $array[0]['id_donatur'] . ' ) ';?><img src="Images/first.png" id="grade"></td>
				</tr>
				<tr>
					<td>2.</td>
					<td><?= $array[1]['nama'] . ' ( ' . $array[1]['id_donatur'] . ' ) ';?><img src="Images/second.png" id="grade"></td>
				</tr>
				<tr>
					<td>3.</td>
					<td><?= $array[2]['nama'] . ' ( ' . $array[2]['id_donatur'] . ' ) ';?><img src="Images/third.png" id="grade"></td>
				</tr>
				<tr>
					<td>4.</td>
					<td><?= $array[3]['nama'] . ' ( ' . $array[3]['id_donatur'] . ' ) ';?></td>
				</tr>
				<tr>
					<td>5.</td>
					<td><?= $array[4]['nama'] . ' ( ' . $array[4]['id_donatur'] . ' ) ';?></td>
				</tr>
				<tr>
					<td>6.</td>
					<td><?= $array[5]['nama'] . ' ( ' . $array[5]['id_donatur'] . ' ) ';?></td>
				</tr>
				<tr>
					<td>7.</td>
					<td><?= $array[6]['nama'] . ' ( ' . $array[6]['id_donatur'] . ' ) ';?></td>
				</tr>
				<tr>
					<td>8.</td>
					<td><?= $array[7]['nama'] . ' ( ' . $array[7]['id_donatur'] . ' ) ';?></td>
				</tr>
			</table>
		</div>

		<?php
			require 'PHP/config.php';
			$query = mysqli_query($conn, "SELECT id_relawan, nama FROM relawan ORDER BY POIN DESC LIMIT 8");
			$array = array();
			$index = 0;
			foreach($query as $data) {
				$array[$index]['nama'] = $data['nama'];
				$array[$index]['id_relawan'] = $data['id_relawan'];
				$index++;
			}
		?>
		<div class="grade-relawan">
			<table>
				<tr>
					<td colspan="2" id="relawan">Relawan</td>
				</tr>
				<tr>
					<td>1.</td>
					<td><?= $array[0]['nama'] . ' ( ' . $array[0]['id_relawan'] . ' ) ';?><img src="Images/first.png" id="grade"></td>
				</tr>
				<tr>
					<td>2.</td>
					<td><?= $array[1]['nama'] . ' ( ' . $array[1]['id_relawan'] . ' ) ';?><img src="Images/second.png" id="grade"></td>
				</tr>
				<tr>
					<td>3.</td>
					<td><?= $array[2]['nama'] . ' ( ' . $array[2]['id_relawan'] . ' ) ';?><img src="Images/third.png" id="grade"></td>
				</tr>
				<tr>
					<td>4.</td>
					<td><?= $array[3]['nama'] . ' ( ' . $array[3]['id_relawan'] . ' ) ';?></td>
				</tr>
				<tr>
					<td>5.</td>
					<td><?= $array[4]['nama'] . ' ( ' . $array[4]['id_relawan'] . ' ) ';?></td>
				</tr>
				<tr>
					<td>6.</td>
					<td><?= $array[5]['nama'] . ' ( ' . $array[5]['id_relawan'] . ' ) ';?></td>
				</tr>
				<tr>
					<td>7.</td>
					<td><?= $array[6]['nama'] . ' ( ' . $array[6]['id_relawan'] . ' ) ';?></td>
				</tr>
				<tr>
					<td>8.</td>
					<td><?= $array[7]['nama'] . ' ( ' . $array[7]['id_relawan'] . ' ) ';?></td>
				</tr>
			</table>
		</div>
		<?php
			require 'PHP/config.php';
			$query = mysqli_query($conn, "SELECT id_kurir, nama FROM kurir ORDER BY POIN DESC LIMIT 8");
			$array = array();
			$index = 0;
			foreach($query as $data) {
				$array[$index]['nama'] = $data['nama'];
				$array[$index]['id_kurir'] = $data['id_kurir'];
				$index++;
			}
		?>
		<div class="grade-kurir">
			<table>
				<tr>
					<td colspan="2" id="kurir">Kurir</td>
				</tr>
				<tr>
					<td>1.</td>
					<td><?= $array[0]['nama'] . ' ( ' . $array[0]['id_kurir'] . ' ) ';?><img src="Images/first.png" id="grade"></td>
				</tr>
				<tr>
					<td>2.</td>
					<td><?= $array[1]['nama'] . ' ( ' . $array[1]['id_kurir'] . ' ) ';?><img src="Images/second.png" id="grade"></td>
				</tr>
				<tr>
					<td>3.</td>
					<td><?= $array[2]['nama'] . ' ( ' . $array[2]['id_kurir'] . ' ) ';?><img src="Images/third.png" id="grade"></td>
				</tr>
				<tr>
					<td>4.</td>
					<td><?= $array[3]['nama'] . ' ( ' . $array[3]['id_kurir'] . ' ) ';?></td>
				</tr>
				<tr>
					<td>5.</td>
					<td><?= $array[4]['nama'] . ' ( ' . $array[4]['id_kurir'] . ' ) ';?></td>
				</tr>
				<tr>
					<td>6.</td>
					<td><?= $array[5]['nama'] . ' ( ' . $array[5]['id_kurir'] . ' ) ';?></td>
				</tr>
				<tr>
					<td>7.</td>
					<td><?= $array[6]['nama'] . ' ( ' . $array[6]['id_kurir'] . ' ) ';?></td>
				</tr>
				<tr>
					<td>8.</td>
					<td><?= $array[7]['nama'] . ' ( ' . $array[7]['id_kurir'] . ' ) ';?></td>
				</tr>
			</table>
		</div>
	</div>

	<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
	<script src = "Javascript/go-up.js"></script>

	<?php require 'Footer/footer.php'; ?>

</body>
</html>