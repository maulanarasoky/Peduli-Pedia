<?php 
	$server = 'localhost';
    $username = 'root';
    $pass = '';
    $dbname = 'Peduli Pedia';

    $conn = mysqli_connect($server, $username, $pass, $dbname);
    if (!$conn) {
        die('Connection Error : ' . mysqli_connect_error($conn));
    }
?>