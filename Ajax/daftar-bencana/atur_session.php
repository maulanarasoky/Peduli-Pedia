<?php

    session_start();

    if(isset($_SESSION['loginDonatur']) == true) {
        echo 'Donatur';
    }elseif(isset($_SESSION['loginRelawan']) == true) {
        echo 'Relawan';
    }

?>