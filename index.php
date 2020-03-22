<?php
    session_start();
    if (empty($_SESSION) || count($_COOKIE) == 0) {
       if (isset($_POST['loginDonatur'])) {
            require "PHP/config.php";
            include "PHP/injection.php";
            $user = injection($_POST['username']);
            $query = "SELECT password, username FROM donatur WHERE username='$user' OR email='$user'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) === 1) {
                $hasil = mysqli_fetch_assoc($result);
                if (password_verify($_POST['password'], $hasil['password'])) {
                    setcookie('username', $hasil['username'], time() + (86400), '/');
                    $_SESSION['user'] = injection($hasil['username']);
                    $_SESSION['donatur'] = true;
                    $_SESSION['loginDonatur'] = true;
                    if (count($_COOKIE) > 0) {
                        echo "<script>alert('Selamat Datang..');document.location.href='home.php';</script>";
                    } else {
                        echo "<script>alert('Selamat Datang..');document.location.href='home.php';</script>";
                    }
                } else {
                    echo "<script>alert('Username/password tidak cocok.');document.location.href='index.php';</script>";
                }
            }else {
	            	 echo "<script>alert('Akun tidak ditemukan...');document.location.href='index.php';</script>";
	        }
        } elseif (isset($_POST['loginRelawan'])) {
	        	require "PHP/config.php";
	            include "PHP/injection.php";
	            $user = injection($_POST['username']);
	            $query = "SELECT password, username FROM relawan WHERE username='$user' OR email='$user'";
	            $result = mysqli_query($conn, $query);
	            if (mysqli_num_rows($result) === 1) {
	                $hasil = mysqli_fetch_assoc($result);
	                if (password_verify($_POST['password'], $hasil['password'])) {
	                    setcookie('user', $hasil['username'], time() + (86400), '/');
	                    $_SESSION['user'] = injection($hasil['username']);
	                    $_SESSION['relawan'] = true;
	                    $_SESSION['loginRelawan'] = true;
	                    if (count($_COOKIE) > 0) {
	                        echo "<script>alert('Selamat Datang..');document.location.href='home.php';</script>";
	                    } else {
	                        echo "<script>alert('Selamat Datang..');document.location.href='home.php';</script>";
	                    }
	                } else {
	                    echo "<script>alert('Username/password tidak cocok.');document.location.href='index.php';</script>";
	                }
	            } else {
	            	 echo "<script>alert('Akun tidak ditemukan...');document.location.href='index.php';</script>";
	            }
	     } elseif (isset($_POST['loginKurir'])){
        	require "PHP/config.php";
            include "PHP/injection.php";
            $user = injection($_POST['username']);
            $query = "SELECT password, username FROM kurir WHERE username='$user' OR email='$user'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) === 1) {
                $hasil = mysqli_fetch_assoc($result);
                if (password_verify($_POST['password'], $hasil['password'])) {
                    setcookie('user', $hasil['username'], time() + (86400), '/');
                    $_SESSION['user'] = injection($hasil['username']);
                    $_SESSION['kurir'] = true;
                    $_SESSION['loginKurir'] = true;
                    if (count($_COOKIE) > 0) {
                        echo "<script>alert('Selamat Datang..');document.location.href='home.php';</script>";
                    } else {
                        echo "<script>alert('Selamat Datang..');document.location.href='home.php';</script>";
                    }
                } else {
                    echo "<script>alert('Username/password tidak cocok.');document.location.href='index.php';</script>";
                }
            } else {
            	 echo "<script>alert('Akun tidak ditemukan...');document.location.href='index.php';</script>";
            }
        } 
    } else {
    	header('Location: home.php');
    }
?>
<!DOCTYPE html>
<html lang="id">
<head>
	<title>Peduli Pedia</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/page-icon.png">
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<link rel="stylesheet" type="text/css" href="CSS/responsive-style.css">
	<script type="text/javascript" src="Jquery/jquery-3.3.1.min.js"></script>
	<script>
	$(document).ready(function(){
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
  		$(".logo button#masuk").click(function(){
  			$(".pilih-login").css({"display":"block"});
			$(".whole-cover").css({"display":"block"});
			$("body").css({"overflow":"hidden"});
			$(".slideshow-container .fade img").css({"width":"128%"});  
  		});
		$(".pilih-login .pilihan button#donatur").click(function(){
			$(".pilih-login").css({"display":"none"});
			$(".login-donatur").css({"display":"block"}); 
  		});
		$(".pilih-login .pilihan button#relawan").click(function(){
			$(".pilih-login").css({"display":"none"});
			$(".login-relawan").css({"display":"block"}); 
  		});
		$(".pilih-login .pilihan button#kurir").click(function(){
			$(".pilih-login").css({"display":"none"});
			$(".login-kurir").css({"display":"block"}); 
  		});

		$(".logo button#daftar").click(function(){
  			$(".pilih-daftar").css({"display":"block"});
			$(".whole-cover").css({"display":"block"});
			$("body").css({"overflow":"hidden"});
			$(".slideshow-container .fade img").css({"width":"128%"});  
  		});
  		$(".whole-cover").click(function(){
			$(".pilih-login").css({"display":"none"});
			$(".pilih-daftar").css({"display":"none"});
			$(".login-donatur").css({"display":"none"});
			$(".login-relawan").css({"display":"none"});
			$(".login-kurir").css({"display":"none"});
			$(".whole-cover").css({"display":"none"});
  			$("body").css({"overflow":"visible"});
			$(".slideshow-container .fade img").css({"width":"127%"});
  		});
	});
	</script>
</head>
<body>
	<!-- Black cover when click login button -->
	<div class="whole-cover"></div>
	
	<!-- Navbar -->
	<div class="navbar">
		<div class="merah">
			<ul>
				<li><a href="cara-donasi.php">Bantuan</a></li>
				<li><a href="tentang-kami.php">Tentang Kami</a></li>
				<li><a href="artikel.php">Artikel</a></li>
			</ul>
		</div>
		<div class="logo" id="logo">
				<a href="index.php"><img src="Images/logo.png" /></a>
				<button id="masuk">Masuk</button>
				<button id="daftar">Daftar</button>
		</div>
	</div>


	<!-- Pilihan menu login -->
	<div class="pilih-login">
		<div class="logo">
			<img src="Images/logo.png" />
		</div>
		<div class="title">
			<h2>Login</h2>
		</div>
		<div class="pilihan">
			<button id="donatur"><img src="Images/donatur-logo.png">Donatur</button>
			<button id="relawan"><img src="Images/relawan-logo.png">Relawan</button>
			<button id="kurir"><img src="Images/kurir-logo.png">Kurir</button>
		</div>
	</div>

	<!-- Pilihan menu daftar -->
	<div class="pilih-daftar">
		<div class="logo">
			<img src="Images/logo.png" />
		</div>
		<div class="title">
			<h2>Daftar</h2>
		</div>
		<div class="pilihan">
			<button id="donatur" onclick="document.location.href='daftar-donatur.php'"><img src="Images/donatur-logo.png">Donatur</button>
			<button id="relawan" onclick="document.location.href='daftar-relawan.php'"><img src="Images/relawan-logo.png">Relawan</button>
			<button id="kurir" onclick="document.location.href='daftar-kurir.php'"><img src="Images/kurir-logo.png">Kurir</button>
		</div>
	</div>

	<!-- Form login donatur -->
	<div class="login-donatur">
		<div class="logo">
			<img src="Images/logo.png" />
		</div>
		<div class="title">
			<h2>Login Donatur</h2>
		</div>
		<div class="form">
			<form method="POST" action="">
				<div class="inputBox">
					<input type="text" name="username" required="">
					<label id="username">Username / Email</label>
				</div>

				<div class="inputBox">
					<input type="password" name="password" required="">
					<label id="password">Password</label>
				</div>

				<input type="submit" name="loginDonatur" value="Login">
			</form>
		</div>
	</div>

	<!-- Form login relawan -->
	<div class="login-relawan">
		<div class="logo">
			<img src="Images/logo.png" />
		</div>
		<div class="title">
			<h2>Login Relawan</h2>
		</div>
		<div class="form">
			<form method="POST">
				<div class="inputBox">
					<input type="text" name="username" required="">
					<label id="username">Username / Email</label>
				</div>

				<div class="inputBox">
					<input type="password" name="password" required="">
					<label id="password">Password</label>
				</div>

				<input type="submit" name="loginRelawan" value="Login">
			</form>
		</div>
	</div>

	<!-- Form login kurir -->
	<div class="login-kurir">
		<div class="logo">
			<img src="Images/logo.png" />
		</div>
		<div class="title">
			<h2>Login Kurir</h2>
		</div>
		<div class="form">
			<form method="POST">
				<div class="inputBox">
					<input type="text" name="username" required="">
					<label id="username">Username / Email</label>
				</div>

				<div class="inputBox">
					<input type="password" name="password" required="">
					<label id="password">Password</label>
				</div>

				<input type="submit" name="loginKurir" value="Login">
			</form>
		</div>
	</div>

	<!-- Slideshow -->
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

	<!-- Script slideshow -->
	<script src = "Javascript/slideshow.js"></script>

	<?php
		require 'PHP/config.php';
		$query = mysqli_query($conn, "SELECT id_donatur, nama, poin FROM donatur ORDER BY POIN DESC LIMIT 8");
		$array = array();
		$index = 0;
		foreach($query as $data) {
			$array[$index]['nama'] = $data['nama'];
			$array[$index]['id_donatur'] = $data['id_donatur'];
			$array[$index]['poin'] = $data['poin'];
			$index++;
		}
	?>

	<!-- Top user donatur -->
	<div class="best">
		<div class="title">
			<h1>Top Users</h1>
		</div>
		<div class="grade">
			<button id="donatur" class="active">Donatur</button>
			<button id="relawan">Relawan</button>
			<button id="kurir">Kurir</button>
		</div>
		<div class="grade-donatur">
			<table>
				<tr>
					<td colspan="2" id="donatur">Donatur</td>
					<td id="poin">Poin</td>
				</tr>
				<tr>
					<td>1.</td>
					<td><?= $array[0]['nama'] . ' ( ' . $array[0]['id_donatur'] . ' ) ';?><img src="Images/first.png" id="grade"></td>
					<td id="poin"><?= $array[0]['poin']; ?></td>
				</tr>
				<tr>
					<td>2.</td>
					<td><?= $array[1]['nama'] . ' ( ' . $array[1]['id_donatur'] . ' ) ';?><img src="Images/second.png" id="grade"></td>
					<td id="poin"><?= $array[1]['poin']; ?></td>
				</tr>
				<tr>
					<td>3.</td>
					<td><?= $array[2]['nama'] . ' ( ' . $array[2]['id_donatur'] . ' ) ';?><img src="Images/third.png" id="grade"></td>
					<td id="poin"><?= $array[2]['poin']; ?></td>
				</tr>
				<tr>
					<td>4.</td>
					<td><?= $array[3]['nama'] . ' ( ' . $array[3]['id_donatur'] . ' ) ';?></td>
					<td id="poin"><?= $array[3]['poin']; ?></td>
				</tr>
				<tr>
					<td>5.</td>
					<td><?= $array[4]['nama'] . ' ( ' . $array[4]['id_donatur'] . ' ) ';?></td>
					<td id="poin"><?= $array[4]['poin']; ?></td>
				</tr>
				<tr>
					<td>6.</td>
					<td><?= $array[5]['nama'] . ' ( ' . $array[5]['id_donatur'] . ' ) ';?></td>
					<td id="poin"><?= $array[5]['poin']; ?></td>
				</tr>
				<tr>
					<td>7.</td>
					<td><?= $array[6]['nama'] . ' ( ' . $array[6]['id_donatur'] . ' ) ';?></td>
					<td id="poin"><?= $array[6]['poin']; ?></td>
				</tr>
				<tr>
					<td>8.</td>
					<td><?= $array[7]['nama'] . ' ( ' . $array[7]['id_donatur'] . ' ) ';?></td>
					<td id="poin"><?= $array[7]['poin']; ?></td>
				</tr>
			</table>
		</div>

		<?php
			require 'PHP/config.php';
			$query = mysqli_query($conn, "SELECT id_relawan, nama, poin FROM relawan ORDER BY POIN DESC LIMIT 8");
			$array = array();
			$index = 0;
			foreach($query as $data) {
				$array[$index]['nama'] = $data['nama'];
				$array[$index]['id_relawan'] = $data['id_relawan'];
				$array[$index]['poin'] = $data['poin'];
				$index++;
			}
		?>
		<!-- Top user relawan -->
		<div class="grade-relawan">
			<table>
				<tr>
					<td colspan="2" id="relawan">Relawan</td>
					<td id="poin">Poin</td>
				</tr>
				<tr>
					<td>1.</td>
					<td><?= $array[0]['nama'] . ' ( ' . $array[0]['id_relawan'] . ' ) ';?><img src="Images/first.png" id="grade"></td>
					<td id="poin"><?= $array[0]['poin']; ?></td>
				</tr>
				<tr>
					<td>2.</td>
					<td><?= $array[1]['nama'] . ' ( ' . $array[1]['id_relawan'] . ' ) ';?><img src="Images/second.png" id="grade"></td>
					<td id="poin"><?= $array[1]['poin']; ?></td>
				</tr>
				<tr>
					<td>3.</td>
					<td><?= $array[2]['nama'] . ' ( ' . $array[2]['id_relawan'] . ' ) ';?><img src="Images/third.png" id="grade"></td>
					<td id="poin"><?= $array[2]['poin']; ?></td>
				</tr>
				<tr>
					<td>4.</td>
					<td><?= $array[3]['nama'] . ' ( ' . $array[3]['id_relawan'] . ' ) ';?></td>
					<td id="poin"><?= $array[3]['poin']; ?></td>
				</tr>
				<tr>
					<td>5.</td>
					<td><?= $array[4]['nama'] . ' ( ' . $array[4]['id_relawan'] . ' ) ';?></td>
					<td id="poin"><?= $array[4]['poin']; ?></td>
				</tr>
				<tr>
					<td>6.</td>
					<td><?= $array[5]['nama'] . ' ( ' . $array[5]['id_relawan'] . ' ) ';?></td>
					<td id="poin"><?= $array[5]['poin']; ?></td>
				</tr>
				<tr>
					<td>7.</td>
					<td><?= $array[6]['nama'] . ' ( ' . $array[6]['id_relawan'] . ' ) ';?></td>
					<td id="poin"><?= $array[6]['poin']; ?></td>
				</tr>
				<tr>
					<td>8.</td>
					<td><?= $array[7]['nama'] . ' ( ' . $array[7]['id_relawan'] . ' ) ';?></td>
					<td id="poin"><?= $array[7]['poin']; ?></td>
				</tr>
			</table>
		</div>
		<?php
			require 'PHP/config.php';
			$query = mysqli_query($conn, "SELECT id_kurir, nama, poin FROM kurir ORDER BY POIN DESC LIMIT 8");
			$array = array();
			$index = 0;
			foreach($query as $data) {
				$array[$index]['nama'] = $data['nama'];
				$array[$index]['id_kurir'] = $data['id_kurir'];
				$array[$index]['poin'] = $data['poin'];
				$index++;
			}
		?>
		<!-- Top user kurir -->
		<div class="grade-kurir">
			<table>
				<tr>
					<td colspan="2" id="kurir">Kurir</td>
					<td id="poin">Poin</td>
				</tr>
				<tr>
					<td>1.</td>
					<td><?= $array[0]['nama'] . ' ( ' . $array[0]['id_kurir'] . ' ) ';?><img src="Images/first.png" id="grade"></td>
					<td id="poin"><?= $array[0]['poin']; ?></td>
				</tr>
				<tr>
					<td>2.</td>
					<td><?= $array[1]['nama'] . ' ( ' . $array[1]['id_kurir'] . ' ) ';?><img src="Images/second.png" id="grade"></td>
					<td id="poin"><?= $array[1]['poin']; ?></td>
				</tr>
				<tr>
					<td>3.</td>
					<td><?= $array[2]['nama'] . ' ( ' . $array[2]['id_kurir'] . ' ) ';?><img src="Images/third.png" id="grade"></td>
					<td id="poin"><?= $array[2]['poin']; ?></td>
				</tr>
				<tr>
					<td>4.</td>
					<td><?= $array[3]['nama'] . ' ( ' . $array[3]['id_kurir'] . ' ) ';?></td>
					<td id="poin"><?= $array[3]['poin']; ?></td>
				</tr>
				<tr>
					<td>5.</td>
					<td><?= $array[4]['nama'] . ' ( ' . $array[4]['id_kurir'] . ' ) ';?></td>
					<td id="poin"><?= $array[4]['poin']; ?></td>
				</tr>
				<tr>
					<td>6.</td>
					<td><?= $array[5]['nama'] . ' ( ' . $array[5]['id_kurir'] . ' ) ';?></td>
					<td id="poin"><?= $array[5]['poin']; ?></td>
				</tr>
				<tr>
					<td>7.</td>
					<td><?= $array[6]['nama'] . ' ( ' . $array[6]['id_kurir'] . ' ) ';?></td>
					<td id="poin"><?= $array[6]['poin']; ?></td>
				</tr>
				<tr>
					<td>8.</td>
					<td><?= $array[7]['nama'] . ' ( ' . $array[7]['id_kurir'] . ' ) ';?></td>
					<td id="poin"><?= $array[7]['poin']; ?></td>
				</tr>
			</table>
		</div>
	</div>

	<!-- Script and tag for go to top button -->
	<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
	<script src = "Javascript/go-up.js"></script>

	<!-- Deskripsi donatur -->
	<div class="donatur" id="donaturr">
		<img src="Images/Donatur.jpg">
		<div class="description">
			<p id="description">Jadilah donatur yang siap dan<br/>tanggap terhadap bencana di<br/>seluruh Indonesia</p>
		</div>
	</div>

	<!-- Deskripsi relawan -->
	<div class="relawan" id="relawann">
		<img src="Images/Relawan.jpg">
		<div class="description">
			<p id="description">Jadilah relawan yang siap dan<br/>tanggap terhadap bencana di<br/>seluruh Indonesia</p>
		</div>
	</div>

	<!-- Deskripsi kurir -->
	<div class="kurir" id="kurirr">
		<img src="Images/Kurir.jpg">
		<div class="description">
			<p id="description">Jadilah kurir yang siap dan<br/>tanggap terhadap bencana di<br/>seluruh Indonesia</p>
		</div>
	</div>

	<!-- Footer -->
	<?php require 'Footer/footer.php'; ?>

</body>
</html>