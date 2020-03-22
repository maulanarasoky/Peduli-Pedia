<?php

    include 'config.php';
    session_start();
    $user = $_SESSION['user'];

    $id_rel = $_GET['id'];

    $update = mysqli_query($conn, "UPDATE AYO_RELAWAN SET STATUS = 'Selesai' WHERE ID_AYO_RELAWAN = '$id_rel'");
?>