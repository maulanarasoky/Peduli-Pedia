<?php

    include 'config.php';
    include 'injection.php';
    session_start();
    $user = $_SESSION['user'];

    $data = json_decode(file_get_contents('php://input'));
    // print_r($data);
    $namaDepan = $data->namaDepan;
    $namaBelakang = $data->namaBelakang;
    $email = strtolower($data->email);
    $nik = $data->nik;
    $tanggal = $data->tanggal;
    $jk = $data->jk;
    $arr_nama = array(injection($namaDepan), injection($namaBelakang));
    $nama = implode(' ', $arr_nama);

    if(isset($_SESSION['loginDonatur']) == true) {
        if(!empty($namaDepan) && !empty($namaBelakang) && !empty($email) && !empty($nik) && !empty($tanggal) && !empty($jk)) {
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $update = mysqli_query($conn, "UPDATE DONATUR SET NAMA = '$nama', EMAIL = '$email', NIK = '$nik', TANGGAL_LAHIR = '$tanggal', JENIS_KELAMIN = '$jk' WHERE USERNAME = '$user'");
                if($update) {
                    echo 'Update Berhasil';
                } else {
                    echo 'Update Gagal';
                }
            } else {
                echo 'Email harus diisi dengan benar..';
            }      
        } else {
            echo 'Inputan harus diisi semua..';
        }
    }elseif(isset($_SESSION['loginRelawan']) == true) {
        if(!empty($namaDepan) && !empty($namaBelakang) && !empty($email) && !empty($nik) && !empty($tanggal) && !empty($jk)) {
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $update = mysqli_query($conn, "UPDATE RELAWAN SET NAMA = '$nama', EMAIL = '$email', NIK = '$nik', TANGGAL_LAHIR = '$tanggal', JENIS_KELAMIN = '$jk' WHERE USERNAME = '$user'");
                if($update) {
                    echo 'Update Berhasil';
                } else {
                    echo 'Update Gagal';
                }
            }else {
                echo 'Email harus diisi dengan benar..';
            }
        }else {
            echo 'Inputan harus diisi semua..';
        }
    }elseif(isset($_SESSION['loginKurir']) == true) {
        if(!empty($namaDepan) && !empty($namaBelakang) && !empty($email) && !empty($nik) && !empty($tanggal) && !empty($jk)) {
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $update = mysqli_query($conn, "UPDATE KURIR SET NAMA = '$nama', EMAIL = '$email', NIK = '$nik', TANGGAL_LAHIR = '$tanggal', JENIS_KELAMIN = '$jk' WHERE USERNAME = '$user'");
                if($update) {
                    echo 'Update Berhasil';
                } else {
                    echo 'Update Gagal';
                }
            }else {
                echo 'Email harus diisi dengan benar..';
            }
        }else {
            echo 'Inputan harus diisi semua..';
        }
    }
    
?>