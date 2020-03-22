<?php

    session_start();

    if(isset($_SESSION['loginDonatur']) == true) {
        header('Location: cara-donasi.php');
    }elseif(isset($_SESSION['loginRelawan']) == true) {
        header('Location: cara-relawan.php');
    }elseif(isset($_SESSION['loginKurir']) == true) {
        header('Location: cara-kurir.php');
    }

?>