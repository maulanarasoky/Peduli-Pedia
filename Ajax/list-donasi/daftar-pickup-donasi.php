<?php

    include 'config.php';
    session_start();
    $user = $_SESSION['user'];

    $id_don = $_GET['id'];

    $id = mysqli_query($conn, "SELECT ID_BENCANA FROM DONASI_BARANG WHERE ID_DONASI_BARANG = '$id_don'");
    $id_k = mysqli_query($conn, "SELECT ID_KURIR FROM KURIR WHERE USERNAME = '$user'");
    while($rec = mysqli_fetch_array($id_k)) {
        $id_kurir = $rec['ID_KURIR'];
        while($row = mysqli_fetch_array($id)) {
            $id_bencana = $row['ID_BENCANA'];
            $insert = mysqli_query($conn, "INSERT INTO DELIVERY (ID_KURIR, ID_DONASI, ID_BENCANA, KONFIRMASI) VALUES('$id_kurir', '$id_don', '$id_bencana', 'Belum Dikonfirmasi')");
            $update = mysqli_query($conn, "UPDATE DONASI_BARANG SET STATUS_KHUSUS = 'Sudah Diambil' WHERE ID_DONASI_BARANG = '$id_don'");
        }
    }
?>