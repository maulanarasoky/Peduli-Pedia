<?php

    include 'config.php';
    session_start();
    $user = $_SESSION['user'];

    $id_don = $_GET['id'];

    $insert = mysqli_query($conn, "UPDATE DELIVERY SET KONFIRMASI = 'Sudah Dikonfirmasi' WHERE ID_DONASI = '$id_don'");
    $update = mysqli_query($conn, "UPDATE DONASI_BARANG SET STATUS_KHUSUS = 'Sudah Diambil', STATUS = 'Sudah Sampai' WHERE ID_DONASI_BARANG = '$id_don'");

    $query = mysqli_query($conn, "SELECT ID_KURIR FROM DELIVERY WHERE ID_DONASI = '$id_don'");

    while($row = mysqli_fetch_array($query)) {
        $id_kurir = $row['ID_KURIR'];
        $get = 20;
        $kurir = mysqli_query($conn, "SELECT POIN FROM KURIR WHERE ID_KURIR = '$id_kurir'");
        while($value = mysqli_fetch_array($kurir)) {
            $newPoin = $value['POIN'] += $get;
            $sql = mysqli_query($conn, "UPDATE KURIR SET POIN = $newPoin  WHERE ID_KURIR='$id_kurir'");
        }
    }
?>