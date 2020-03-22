<?php

    session_start();
    require 'config.php';
    $user = $_SESSION['user'];

    $array = array();

    if(isset($_SESSION['loginDonatur']) == true) {
        $query = mysqli_query($conn, "SELECT NAMA, EMAIL, NIK, TANGGAL_LAHIR, JENIS_KELAMIN FROM DONATUR WHERE USERNAME = '$user'");
        while($value = mysqli_fetch_array($query)) {
            $nama = $value['NAMA'];
            $email = $value['EMAIL'];
            $nik = $value['NIK'];
            $tanggal = $value['TANGGAL_LAHIR'];
            $explode = explode(' ', $nama);

            array_push($array, array(
                'namaDepan' => $explode[0],
                'namaBelakang' => $explode[1],
                'email' => $value['EMAIL'],
                'nik' => $value['NIK'],
                'tanggal_lahir' => $value['TANGGAL_LAHIR'],
                'jenis_kelamin' => $value['JENIS_KELAMIN']

            ));
        }
    }elseif (isset($_SESSION['loginRelawan']) == true) {
        $query = mysqli_query($conn, "SELECT NAMA, EMAIL, NIK, TANGGAL_LAHIR, JENIS_KELAMIN FROM RELAWAN WHERE USERNAME = '$user'");
            while($value = mysqli_fetch_array($query)) {
                $nama = $value['NAMA'];
                $email = $value['EMAIL'];
                $nik = $value['NIK'];
                $tanggal = $value['TANGGAL_LAHIR'];
                $explode = explode(' ', $nama);
    
                array_push($array, array(
                    'namaDepan' => $explode[0],
                    'namaBelakang' => $explode[1],
                    'email' => $value['EMAIL'],
                    'nik' => $value['NIK'],
                    'tanggal_lahir' => $value['TANGGAL_LAHIR'],
                    'jenis_kelamin' => $value['JENIS_KELAMIN']
    
                ));
            }
        }elseif (isset($_SESSION['loginKurir']) == true) {
            $query = mysqli_query($conn, "SELECT NAMA, EMAIL, NIK, TANGGAL_LAHIR, JENIS_KELAMIN FROM KURIR WHERE USERNAME = '$user'");
                while($value = mysqli_fetch_array($query)) {
                    $nama = $value['NAMA'];
                    $email = $value['EMAIL'];
                    $nik = $value['NIK'];
                    $tanggal = $value['TANGGAL_LAHIR'];
                    $explode = explode(' ', $nama);
        
                    array_push($array, array(
        
                        'namaDepan' => $explode[0],
                        'namaBelakang' => $explode[1],
                        'email' => $value['EMAIL'],
                        'nik' => $value['NIK'],
                        'tanggal_lahir' => $value['TANGGAL_LAHIR'],
                        'jenis_kelamin' => $value['JENIS_KELAMIN']
        
                    ));
                }
            }

    echo json_encode($array);

?>