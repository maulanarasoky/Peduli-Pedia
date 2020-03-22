<?php

    include 'config.php';
    include 'injection.php';
    session_start();
    $user = $_SESSION['user'];

    $data = json_decode(file_get_contents('php://input'));
    $nominal = $data->nominal;
    $bank = $data->bank;
    $catatan = $data->catatan;
    $id_bencana = $_SESSION['id_bencana'];

        $insert = mysqli_query($conn, "INSERT INTO DONASI_UANG (nominal, bank, catatan, status, id_donatur, id_bencana) VALUES('$nominal', '$bank', '$catatan', 'Belum Dikonfirmasi', (SELECT ID_DONATUR FROM DONATUR WHERE USERNAME = '$user'), '$id_bencana')");
    
?>