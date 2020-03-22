<!DOCTYPE html>
<?php
session_start();
    if (empty($_SESSION) || count($_COOKIE) == 0) {
        echo "<script>alert('Login dulu ya..');document.location.href='../index.php';</script>";
    }elseif (!isset($_SESSION['id_bencana'])) {
        echo "<script>document.location.href='../daftar-bencana.php';</script>";
    }elseif (!isset($_SESSION['loginRelawan'])) {
		echo "<script>alert('Access Denied..');document.location.href='../home.php';</script>";
	}
    require '../PHP/config.php';
	$user = $_SESSION['user'];
?>
<html>
<head>
	<title>Ayo Donasi</title>
	<link rel="stylesheet" type="text/css" href="../CSS/style-relawan.css">
	<link rel="icon" href="../Images/page-icon.png">
	<script type="text/javascript" src="../ajax-donasi.js"></script>
	<script type="text/javascript" src="../Jquery/jquery-3.3.1.min.js"></script>
	<script>
	$(document).ready(function(){
	  	$(".back-title").click(function(){
		  	$(".donasii").css({"display":"block"});
		  	$(".donasii-uang").css({"display":"none"});
		  	$(".back-title").css({"background-color":"#e52425"});
		  	$(".back-title p#title").css({"color":"white"});
		  	$(".back-titlee").css({"background":"rgb(228, 228, 228)"});
		  	$(".back-titlee p#titlee").css({"color":"#e52425"});
  		});
  		$(".back-titlee").click(function(){
  			$(".donasii").css({"display":"none"});
		  	$(".donasii-uang").css({"display":"block"});
		  	$(".back-title").css({"background":"rgb(228, 228, 228)"});
		  	$(".back-title p#title").css({"color":"#e52425"});
		  	$(".back-titlee").css({"background-color":"#e52425"});
		  	$(".back-titlee p#titlee").css({"color":"white"});
  		});
	  });
	</script>
</head>
<body>

	<div class="navbar-logo">
		<div class="logo">
			<a href="../home.php" id="home"><img src="../Images/logo.png" /></a>
		</div>
		<div class="user">
			<?php 
				if (isset($_SESSION['loginRelawan']) == true) {
					$nama = mysqli_query($conn, "SELECT NAMA FROM RELAWAN WHERE USERNAME = '$user'");
						foreach ($nama as $value) {
							$explode = explode(' ', $value['NAMA']);
							echo "<a href='profile.php' id='user'><img src='../Images/user.png'><p id='user'>" . $explode[0] . '</p></a>';
						}
				}
			?>
		</div>
	</div>

	<div class="semuaa">
		<div class="langkah">
			<ul>
				<li>
					<img src="../Images/angka/black-1.png" alt="1">
					<div class="tulisan">
						<p>Daftar Alamat</p>
					</div>
				</li>
				<li>
					<img src="../Images/angka/black-2.png" alt="2">
					<div class="tulisan">
						<p>Pilih Bencana</p>
					</div>
				</li>
				<li>
					<img src="../Images/angka/black-3.png" alt="3">
					<div class="tulisan">
						<p>Konfirmasi</p>
					</div>
				</li>
				<li>
					<img src="../Images/angka/4.png" alt="4">
					<div class="tulisan">
						<p id="pilih">Tunggu Penjemputan</p>
					</div>
				</li>
			</ul>
		</div>

		<div class="whole">
			
			<?php
				echo "<div class='valid'>
					<h1 id='keterangan'>Mohon tunggu panitia akan datang menjemput anda</h1>
					</div>";
			?>
		</div>
		
		<!-- <button id="next" name="send">Kirim</button> -->
		<button id="back" name="back" onclick="alert('Anda tidak bisa kembali ke page sebelumnnya..'); document.location.href='ayo-relawan4.php';">Kembali</button>
		<form method="POST">
		<input type="submit" id="next" name="next" value="Selesai" onclick="document.location.href='../home.php';">
	</form>
	</form>
	</div>

	<?php
		if (isset($_POST['next'])) {
            $nama_peserta = $_SESSION['nama_peserta'];
            $alamat_peserta = $_SESSION['alamat_peserta'];
			$id_peserta = $_SESSION['id_peserta'];
			$id_bencana = $_SESSION['id_bencana'];
            $nik_peserta = $_SESSION['nik_peserta'];
            $insertData = mysqli_query($conn, "INSERT INTO AYO_RELAWAN (NAMA_PESERTA, ALAMAT_PESERTA, NIK, ID_BENCANA, ID_RELAWAN) VALUES('$nama_peserta', '$alamat_peserta', '$nik_peserta', '$id_bencana', '$id_peserta')");
            if($insertData) {
                $poin = mysqli_query($conn, "SELECT POIN FROM RELAWAN WHERE USERNAME = '$user'");
                foreach ($poin as $value) {
                    $poin_baru = $value['POIN'];
                    $get = 20;
					$poin_baru += $get;
					$update_status = mysqli_query($conn, "UPDATE AYO_RELAWAN SET STATUS = 'Sedang Berlangsung' WHERE ID_RELAWAN = (SELECT ID_RELAWAN FROM RELAWAN WHERE USERNAME = '$user')");
                    $update_poin = mysqli_query($conn, "UPDATE RELAWAN SET POIN = $poin_baru WHERE USERNAME = '$user'");
                    if ($update_poin) {
                        echo "<script>alert('Horeee.. Anda mendapatkan 20 Poin..');document.location.href = '../home.php';</script>";
                        unset($_SESSION['nama_bencana']);
                        unset($_SESSION['id_bencana']);
                        unset($_SESSION['gambar_bencana']);
                    }
                }
			}
		}
	?>

</body>
</html>