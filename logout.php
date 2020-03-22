<?php
	session_start();
	require 'PHP/config.php';
	$user = $_SESSION['user'];
	if(isset($_SESSION['loginDonatur']) == true) {
		$queryadmin = "UPDATE donatur SET status = 'Offline' WHERE username ='$user'";
		mysqli_query($conn, $queryadmin);
	}elseif(isset($_SESSION['loginRelawan']) == true) {
		$queryadmin = "UPDATE relawan SET status= 'Offline' WHERE username='$user'";
		mysqli_query($conn, $queryadmin);
	}elseif(isset($_SESSION['loginKurir']) == true) {
		$queryadmin = "UPDATE kurir SET status= 'Offline' WHERE username ='$user'";
		mysqli_query($conn, $queryadmin);
	}elseif(isset($_SESSION['panitia']) == true) {
		$queryadmin = "UPDATE panitia SET status= 'Offline' WHERE username ='$user'";
		mysqli_query($conn, $queryadmin);
	}
	session_unset();
	session_destroy();
	setcookie('user', '', time() - (3600));
	echo "<script>alert('Logout berhasil...');document.location.href='index.php';</script>";
?>