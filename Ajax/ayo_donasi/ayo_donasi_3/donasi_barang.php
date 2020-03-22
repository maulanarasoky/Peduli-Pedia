<?php

    include 'config.php';
    session_start();
    $user = $_SESSION['user'];

    $data = json_decode(file_get_contents('php://input'));
    $namaBarang = $data->namaBarang;
    $jumlah = $data->jumlah;
    $catatan = $data->catatan;
    $id_bencana = $_SESSION['id_bencana'];

    $insert = mysqli_query($conn, "INSERT INTO DONASI_BARANG (nama_barang, jumlah_barang, catatan, status, id_donatur, id_bencana, status_khusus) VALUES('$namaBarang', '$jumlah', '$catatan', 'Pending', (SELECT ID_DONATUR FROM DONATUR WHERE USERNAME = '$user'), '$id_bencana', 'Belum Diambil')");
    
?>