<?php
        require 'injection.php';
        require 'config.php';
        
        $data = json_decode(file_get_contents('php://input'));
        // print_r($data);

        $namaDepan = ucwords(strtolower($data->namaDepan));
        $namaBelakang = ucwords(strtolower($data->namaBelakang));
        $username = strtolower(injection($data->username));
        $email = strtolower(injection($data->email));
        $pass = $data->password;
        $pass_re = $data->password_re;
        $nik = $data->nik;
        
        $arr = array(injection($namaDepan), injection($namaBelakang));
        $nama = implode(' ', $arr);
    
        if(!empty($namaDepan) && !empty($namaBelakang) && !empty($username) && !empty($email) && !empty($pass) && !empty($pass_re)) {
            if(strlen($username) >= 6 && strlen($username) <= 15) {
                if(strlen($nik) >= 14 && strlen($nik) <= 17) {
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        if(strlen($pass) >= 6 && strlen($pass) <= 15) {
                            if (preg_match('/^([a-zA-Z0-9 \'\-])*$/', $namaDepan) && preg_match('/^([a-zA-Z0-9 \'\-])*$/', $namaBelakang)) {
                                $password = password_hash(injection($pass), PASSWORD_DEFAULT);
                                $password_re = password_hash(injection($pass_re), PASSWORD_DEFAULT);
                                if($pass == $pass_re) {
                                    $insert = mysqli_query($conn, "INSERT INTO KURIR (nama, username, email, password, status, nik) VALUES('$nama', '$username', '$email', '$password', 'Offline', '$nik')");
                                    if($insert) {
                                        echo 'Registrasi Berhasil..';
                                    } else {
                                        echo 'Registrasi Gagal..';
                                    }
                                } else {
                                        echo 'Password tidak cocok..';
                                }
                            }else {
                                echo 'Nama harus memiliki karakter yang sesuai.';
                            }
                        } else {
                            echo 'Password harus terdiri dari 6 - 15 karakter..';
                        }
                    } else {
                            echo 'Email harus diisi dengan benar..';
                    }
                }else {
                    echo 'NIK harus terdiri dari 6 - 15 karakter..';
                }
            } else {
                echo 'Username harus terdiri dari 6 - 15 karakter..';
            }    
        } else {
             echo 'Inputan harus diisi semua..';
        }
?>