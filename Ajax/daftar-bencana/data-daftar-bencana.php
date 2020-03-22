<?php

    include 'config.php';

    $array = array();

    $daftar_bencana = mysqli_query($conn, "SELECT id_bencana, nama_bencana, gambar_bencana, deskripsi_bencana, tanggal_waktu FROM daftar_bencana");
		while ($value = mysqli_fetch_array($daftar_bencana)) {
            $gambar = base64_encode($value['gambar_bencana']);
            array_push($array, array(
                'nama_bencana' => $value['nama_bencana'],
                'gambar_bencana' =>  $gambar,
                'id_bencana' => $value['id_bencana'],
                'deskripsi_bencana' => $value['deskripsi_bencana'],
                'tanggal_waktu' => $value['tanggal_waktu'],
            ));
        }
        echo json_encode($array);
?>