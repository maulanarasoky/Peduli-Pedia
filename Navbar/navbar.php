<!DOCTYPE html>
<html>
    <head>
        <title></title>
		<link rel="stylesheet" type="text/css" href="CSS/navbar.css">
		<link rel="stylesheet" type="text/css" href="CSS/responsive-navbar.css">
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
							echo "<a href='profile.php' id='user'><img src='Images/user.png' id='foto-profile'><p id='user'>" . $explode[0] . '</p></a>';
						}
				} elseif (isset($_SESSION['loginRelawan']) == true) {
					$nama = mysqli_query($conn, "SELECT NAMA, EMAIL FROM RELAWAN WHERE USERNAME = '$user'");
						foreach ($nama as $value) {
							$explode = explode(' ', $value['NAMA']);
							echo "<a href='profile.php' id='user'><img src='Images/user.png' id='foto-profile'><p id='user'>" . $explode[0] . '</p></a>';
						}
				} elseif (isset($_SESSION['loginKurir']) == true) {
					$nama = mysqli_query($conn, "SELECT NAMA, EMAIL FROM KURIR WHERE USERNAME = '$user'");
						foreach ($nama as $value) {
							$explode = explode(' ', $value['NAMA']);
							echo "<a href='profile.php' id='user'><img src='Images/user.png' id='foto-profile'><p id='user'>" . $explode[0] . '</p></a>';
						}
				}
			?>
		</div>
	</div>
</body>
</html>