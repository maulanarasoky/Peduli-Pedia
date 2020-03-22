<?php
    include 'config.php';
    session_start();
    
    $ray = array();

    $query = mysqli_query($conn, "SELECT ID_AYO_RELAWAN, ID_RELAWAN, ID_BENCANA FROM AYO_RELAWAN WHERE STATUS = 'Sedang Berlangsung'");
		while($row = mysqli_fetch_array($query)) {
            $id_bencana = $row['ID_BENCANA'];
            $id_relawan = $row['ID_RELAWAN'];
			$ayo_relawan = mysqli_query($conn, "SELECT NAMA_BENCANA, JADWAL_RELAWAN, GAMBAR_BENCANA, TANGGAL_WAKTU FROM DAFTAR_BENCANA WHERE ID_BENCANA = '$id_bencana'");
			while($ayo_relawann = mysqli_fetch_array($ayo_relawan)) {
                $relawan = mysqli_query($conn, "SELECT nama FROM RELAWAN WHERE id_relawan = '$id_relawan'");
                while($relawan_data = mysqli_fetch_array($relawan)) {
                    array_push($ray, array(
                        'nama_bencana' => $ayo_relawann['NAMA_BENCANA'],
                        'id_ayo_relawan' => $row['ID_AYO_RELAWAN'],
                        'nama_relawan' => $relawan_data['nama'],
                        'tanggal_waktu' => $ayo_relawann['TANGGAL_WAKTU'],
                        'gambar_bencana' => base64_encode($ayo_relawann['GAMBAR_BENCANA'])
                    ));
                }
            }
        }        
    echo json_encode($ray);
?>