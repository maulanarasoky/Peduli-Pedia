<?php
    include 'config.php';

    session_start();

    $user = $_SESSION['user'];

    if(isset($_SESSION['loginDonatur']) == true) {
        $data = mysqli_query($conn, "SELECT * FROM ALAMAT_DONATUR WHERE ID_DONATUR = (SELECT ID_DONATUR FROM DONATUR WHERE USERNAME = '$user')");
    
        $ray = array();

        while($row = mysqli_fetch_array($data)) {
            array_push($ray, array(
                'id_alamat' => $row['id_alamat'],
                'nama_alamat' => $row['nama_alamat'],
                'atas_nama' => $row['atas_nama'],
                'nomor_telepon' => $row['nomor_telepon'],
                'provinsi' => $row['provinsi'],
                'kota_kabupaten' => $row['kota_kabupaten'],
                'kecamatan' => $row['kecamatan'],
                'kode_pos' => $row['kode_pos'],
                'alamat' => $row['alamat']
            ));
        }
        echo json_encode($ray);   
    } elseif(isset($_SESSION['loginRelawan']) == true) {
        $data = mysqli_query($conn, "SELECT * FROM ALAMAT_RELAWAN WHERE ID_RELAWAN = (SELECT ID_RELAWAN FROM RELAWAN WHERE USERNAME = '$user')");
    
        $ray = array();

        while($row = mysqli_fetch_array($data)) {
            array_push($ray, array(
                'id_alamat' => $row['id_alamat'],
                'nama_alamat' => $row['nama_alamat'],
                'atas_nama' => $row['atas_nama'],
                'nomor_telepon' => $row['nomor_telepon'],
                'provinsi' => $row['provinsi'],
                'kota_kabupaten' => $row['kota_kabupaten'],
                'kecamatan' => $row['kecamatan'],
                'kode_pos' => $row['kode_pos'],
                'alamat' => $row['alamat']
            ));
        }
        echo json_encode($ray);
    }

    mysqli_close($conn);
?>