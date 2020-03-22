<?php
    include 'config.php';
    
    session_start();

    $user = $_SESSION['user'];
    
    $get = 20;
    $donatur = mysqli_query($conn, "SELECT POIN FROM DONATUR WHERE USERNAME = '$user'");
    foreach($donatur as $value) {
        $newPoin = $value['POIN'] += $get;
        $sql = mysqli_query($conn, "UPDATE DONATUR SET POIN = $newPoin  WHERE USERNAME='$user'");
    }
?>