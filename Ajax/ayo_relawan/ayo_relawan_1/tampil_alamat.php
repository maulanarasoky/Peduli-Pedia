<?php

    include 'config.php';

    session_start();
    $user = $_SESSION['user'];
    $data = mysqli_query($conn, "SELECT atas_nama, alamat, nomor_telepon FROM ALAMAT_RELAWAN WHERE ID_RELAWAN = (SELECT ID_RELAWAN FROM RELAWAN WHERE USERNAME = '$user')");

    $ray = array();

        while($row = mysqli_fetch_array($data)) {
            array_push($ray, array(
                'nama_pemilik' => $row['atas_nama'],
                'alamat' => $row['alamat'],
                'nomor_telepon' => $row['nomor_telepon']
            ));
        }  
    echo json_encode($ray);
?>