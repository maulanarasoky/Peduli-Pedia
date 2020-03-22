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
	<title>Ayo Relawan</title>
	<link rel="stylesheet" type="text/css" href="../CSS/style-relawan.css">
	<link rel="icon" href="../Images/page-icon.png">
	<!-- <script type="text/javascript" src="ajax-donasi.js"></script> -->
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
					<img src="../Images/angka/black-2.png" alt="2">
					<div class="tulisan">
						<p>Pilih Bencana</p>
					</div>
				</li>
				<li>
					<img src="../Images/angka/3.png" alt="3">
					<div class="tulisan">
						<p id = "pilih">Konfirmasi</p>
					</div>
                </li>
                <li>
					<img src="../Images/angka/black-4.png" alt="4">
					<div class="tulisan">
						<p>Tunggu Penjemputan</p>
					</div>
				</li>
			</ul>
		</div>
		<div class="whole">
			<div class="alamat">
				<div class="bencana">
                    <img src = "<?php echo $_SESSION['gambar_bencana']; ?>" id="gambar">
                    <p><?php echo $_SESSION['nama_bencana']; ?></p>
                </div>
                <?php
                    $query = mysqli_query($conn, "SELECT NAMA, ID_RELAWAN, NIK, JENIS_KELAMIN FROM RELAWAN WHERE USERNAME = '$user'");
                    foreach($query as $value){
                        $id = $value['ID_RELAWAN'];
                        $alamat = mysqli_query($conn, "SELECT ALAMAT FROM ALAMAT_RELAWAN WHERE ID_RELAWAN = '$id'");
                        foreach($alamat as $valuee) {
                            $_SESSION['nama_peserta'] = $value['NAMA'];
                            $_SESSION['alamat_peserta'] = $valuee['ALAMAT'];
                            $_SESSION['id_peserta'] = $value['ID_RELAWAN'];
                            $_SESSION['nik_peserta'] = $value['NIK'];
                            echo "<div class='bio'>
                                <p>No. KTP : " . $value['NIK'] . "</p>
                                <p>Nama : " . $value['NAMA'] . "</p>
                                <p>Alamat : " . $valuee['ALAMAT'] . "</p>
                                <p>Jenis Kelamin : " . $value['JENIS_KELAMIN'] . "</p>
                            </div>";
                        }
                    }
                ?>
                <div class="agreement">
                    <p>Akan mengikuti bantuan sebagai relawan dan mengikuti peraturan yang ada saat menjadi relawan</p>
                </div>
                <div class="checkbox">
                    <form method = "POST">
                        <table id="setuju">
                            <tr>
                                <td><input type="checkbox" name="setuju" id="setuju"></td>
                                <td>Saya setuju</td>
                            </tr>
                        </table>
                </div>
            </div>
                        <input type="submit" id="nextt" name="next" value="Selanjutnya" onclick="document.location.href='ayo-relawan4.php';">
                    </form>
        </div>
    </div>
    
        <?php
            if(isset($_POST['next'])) {
                if(isset($_POST['setuju'])) {
                    echo "<script>alert('Permintaan akan kami proses lebih lanjut...');document.location.href='ayo-relawan4.php';</script>";
                } else {
                    echo "<script>alert('Anda harus setuju dengan perjanjian terlebih dahulu..');document.location.href='ayo-relawan3.php';</script>";
                }
            }
        ?>

</body>
</html>