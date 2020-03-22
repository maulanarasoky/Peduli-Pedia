<!DOCTYPE html>
<?php
session_start();
    if (empty($_SESSION) || count($_COOKIE) == 0) {
         echo "<script>alert('Login dulu ya..');document.location.href='../index.php';</script>";
    }elseif (!isset($_SESSION['id_bencana'])) {
        	echo "<script>document.location.href='../daftar-bencana.php';</script>";
    }elseif (!isset($_SESSION['loginDonatur'])) {
		echo "<script>alert('Access Denied..');document.location.href='../index.php';</script>";
	}
    require '../PHP/config.php';
	$user = $_SESSION['user'];
?>
<html>
<head>
	<title>Ayo Donasi</title>
	<link rel="stylesheet" type="text/css" href="../CSS/style-donasi.css">
	<link rel="icon" href="../Images/page-icon.png">
	<script type="text/javascript" src="../Jquery/jquery-3.3.1.min.js"></script>
	<script>
	$(document).ready(function(){
	  	$(".back-title").click(function(){
		  	$(".donasi").css({"display":"block"});
		  	$(".donasi-uang").css({"display":"none"});
		  	$(".back-title").css({"background-color":"#e52425"});
		  	$(".back-title p#title").css({"color":"white"});
		  	$(".back-titlee").css({"background":"rgb(228, 228, 228)"});
		  	$(".back-titlee p#titlee").css({"color":"#e52425"});
  		});
  		$(".back-titlee").click(function(){
  			$(".donasi").css({"display":"none"});
		  	$(".donasi-uang").css({"display":"block"});
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
				if (isset($_SESSION['loginDonatur']) == true) {
					$nama = mysqli_query($conn, "SELECT NAMA FROM DONATUR WHERE USERNAME = '$user'");
						foreach ($nama as $value) {
							$explode = explode(' ', $value['NAMA']);
							echo "<a href='profile.php' id='user'><img src='../Images/user.png'><p id='user'>" . $explode[0] . '</p></a>';
						}
				}
			?>
		</div>
	</div>

	<div class="semua">
		<div class="langkah">
			<ul>
				<li>
					<img src="../Images/angka/black-1.png" alt="1">
					<div class="tulisan">
						<p>Daftar Alamat</p>
					</div>
				</li>
				<li>
					<img src="../Images/angka/2.png" alt="2">
					<div class="tulisan">
						<p id="pilih">Pilih Donasi</p>
					</div>
				</li>
				<li>
					<img src="../Images/angka/black-3.png" alt="3">
					<div class="tulisan">
						<p>Konfirmasi</p>
					</div>
				</li>
				<li>
					<img src="../Images/angka/black-4.png" alt="4">
					<div class="tulisan">
						<p>Tunggu Kurir/Pembayaran</p>
					</div>
				</li>
			</ul>
		</div>


		<div class="whole">
			<div class="back-title">
				<p id="title">Barang</p>
			</div>
			<div class="back-titlee">
				<p id="titlee">Uang</p>
			</div>
			<div class="donasi">
				<form method="POST">
					<table id="barang">
						<center>
						<tr>
							<td id="nama">
                                <p>Nama Barang</p>
                                <input type="text" name="namaBarang" id="namaBarang">
                            </td>
                            <td>
                                <p>Jumlah</p>
                                <input type="number" name="jumlah" id="jumlah">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p>Catatan</p>
                                <textarea name="catatan_barang" id="catatan"></textarea>
                            </td>
                        </tr>
						</center>
					</table>
                    <button type="submit" id="save" name="save">Simpan</button>
				</form>
				<table id='daftar-bencana'>
					<tr>
						<th colspan='2'>Daftar Bencana Saat Ini</th>
					</tr>
					<tr>
						<td>1</td>
						<td><?php $nama_bencana = $_SESSION['nama_bencana']; echo $nama_bencana; ?></td>
					</tr>
				</table>
			</div>

				<div class="donasi-uang">
					<form method="POST">
						<table id="barang">
							<center>
							<tr>
								<td id="nama">
									<p>Nominal</p>
									<input type="number" name="nominal" id="nominal">
								</td>
								<td>
									<p>Bank</p>
									<select id="bank" name="bank">
										<option value="BCA">BCA</option>
										<option value="BNI">BNI</option>
										<option value="MANDIRI">MANDIRI</option>
									</select>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<p>Catatan</p>
									<textarea name="catatan_nominal" id="catatan"></textarea>
								</td>
							</tr>
							</center>
						</table>
						<button type="submit" id="save" name="savee">Simpan</button>
					</form>
					<table id='daftar-bencana'>
						<tr>
							<th colspan='2'>Daftar Bencana Saat Ini</th>
						</tr>
						<tr>
							<td>1</td>
							<td><?php $nama_bencana = $_SESSION['nama_bencana']; echo $nama_bencana; ?></td>
						</tr>
					</table>
				</div>
				<?php
					if (isset($_POST['save'])) {
						if (!empty($_POST['namaBarang']) && !empty($_POST['jumlah']) && !empty($_POST['catatan_barang'])) {
							if (preg_match('/^([a-zA-Z0-9 \'\-])*$/', $_POST['namaBarang'])) {
								if (preg_match('/^([a-zA-Z0-9 \'\-])*$/', $_POST['catatan_barang'])) {
									$namaBarang = ucwords($_POST['namaBarang']);
									$jumlah = $_POST['jumlah'];
									$catatan_barang = ucwords($_POST['catatan_barang']);
									include '../PHP/injection.php';

									$_SESSION['namaBarang'] = injection($namaBarang);
									$_SESSION['jumlah'] = $jumlah;
									$_SESSION['catatan_barang'] = injection($catatan_barang);
									$_SESSION['barang'] = true;

									echo "<script>alert('Donasi anda sedang di proses..');document.location.href = 'ayo-donasi3.php';</script>";
								} else {
									echo "<script>alert('Jangan macam-macam ya..');document.location.href = 'ayo-donasi2.php';</script>";
								}
							} else {
								echo "<script>alert('Jangan macam-macam ya..');document.location.href = 'ayo-donasi2.php';</script>";
							}
							

						} else {
							echo "<script>alert('Inputan harus diisi semua..');document.location.href = 'ayo-donasi2.php';</script>";
						}
					} elseif (isset($_POST['savee'])) {
						if (!empty($_POST['nominal']) && !empty($_POST['bank']) && !empty($_POST['catatan_nominal'])) {
							$nominal = $_POST['nominal'];
							$bank = $_POST['bank'];
							$catatan = $_POST['catatan_nominal'];
							include '../PHP/injection.php';

							$_SESSION['nominal'] = $nominal;
							$_SESSION['catatan'] = injection($catatan);
							$_SESSION['bank'] = $bank;
							$_SESSION['donasi-uang'] = true;

							echo "<script>alert('Donasi anda sedang di proses..');document.location.href = 'ayo-donasi3.php';</script>";

						}else {
								echo "<script>alert('Inputan harus diisi semua..');document.location.href = 'ayo-donasi2.php';</script>";
						}
					}
				?>
	        <!-- <button type = "button" id="next" name="next" onclick="document.location.href='ayo-donasi3.php';">Selanjutnya</button> -->
        	<button type="button" id="back" name="back" onclick="document.location.href='ayo-donasi.php';">Kembali</button>
</div>
</body>
</html>