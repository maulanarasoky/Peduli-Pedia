<?php

    include 'config.php';
    session_start();
    $user = $_SESSION['user'];

    $id_don = $_GET['id'];

    $data = json_decode(file_get_contents('php://input'));
    print_r($data);
    $bukti = $data->bukti;
    $status = $data->status;
    $keterangan = $data->keterangan;

    $update = mysqli_query($conn, "UPDATE DONASI_BARANG SET STATUS = '$status', DESKRIPSI = '$keterangan' WHERE ID_DONASI_BARANG = '$id_don'");
?>