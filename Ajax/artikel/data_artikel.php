<?php

    $id = $_GET['id'];
    include 'config.php';

    $array = array();

    $artikel = mysqli_query($conn, "SELECT judul, deskripsi, tanggal_waktu, hari, gambar_artikel FROM artikel WHERE id_artikel = '$id'");
		while ($data_artikel = mysqli_fetch_array($artikel)) {
            $gambar = base64_encode($data_artikel['gambar_artikel']);
            $deskripsi = nl2br($data_artikel['deskripsi'], false);
            array_push($array, array(
                'judul' => $data_artikel['judul'],
                'deskripsi' => $deskripsi,
                'gambar_artikel' =>  $gambar,
                'tanggal_waktu' => $data_artikel['tanggal_waktu'],
                'hari' => $data_artikel['hari']
            ));
        }
        echo json_encode($array);
?>