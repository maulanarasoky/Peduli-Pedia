<?php

    include 'config.php';

    $array = array();

    $artikel = mysqli_query($conn, "SELECT id_artikel, judul, tanggal_waktu, hari, gambar_artikel FROM artikel ORDER BY tanggal_waktu DESC LIMIT 3");
		while ($data_artikel = mysqli_fetch_array($artikel)) {
            $gambar = base64_encode($data_artikel['gambar_artikel']);
            array_push($array, array(
                'id_artikel' => $data_artikel['id_artikel'],
                'judul' => $data_artikel['judul'],
                'gambar_artikel' =>  $gambar,
                'tanggal_waktu' => $data_artikel['tanggal_waktu'],
                'hari' => $data_artikel['hari']
            ));
        }
        echo json_encode($array);
?>