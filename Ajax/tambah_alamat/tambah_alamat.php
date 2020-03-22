<?php

    include 'config.php';
    include 'injection.php';
    session_start();
    $user = $_SESSION['user'];

    $data = json_decode(file_get_contents('php://input'));
    print_r($data);
    $nama_alamat = injection($data->nama_alamat);
    $atas_nama = injection($data->atas_nama);
    $nomor_telepon = $data->nomor_telepon;
    $provinsi = injection($data->provinsi);
    $kota_kabupaten = injection($data->kota_kabupaten);
    $kecamatan = injection($data->kecamatan);
    $kode_pos = $data->kode_pos;
    $alamat_lengkap = injection($data->alamat_lengkap);

    if(isset($_SESSION['loginDonatur']) == true) {
        $insert = mysqli_query($conn, "INSERT INTO ALAMAT_DONATUR (nama_alamat, atas_nama, nomor_telepon, provinsi, kota_kabupaten, kecamatan, kode_pos, alamat, id_donatur) VALUES('$nama_alamat', '$atas_nama', '$nomor_telepon', '$provinsi', '$kota_kabupaten', '$kecamatan', '$kode_pos', '$alamat_lengkap', (SELECT ID_DONATUR FROM DONATUR WHERE USERNAME = '$user'))");
    }elseif(isset($_SESSION['loginRelawan']) == true) {
        $insert = mysqli_query($conn, "INSERT INTO ALAMAT_RELAWAN (nama_alamat, atas_nama, nomor_telepon, provinsi, kota_kabupaten, kecamatan, kode_pos, alamat, id_relawan) VALUES('$nama_alamat', '$atas_nama', '$nomor_telepon', '$provinsi', '$kota_kabupaten', '$kecamatan', '$kode_pos', '$alamat_lengkap', (SELECT ID_RELAWAN FROM RELAWAN WHERE USERNAME = '$user'))");
    }
    
?>