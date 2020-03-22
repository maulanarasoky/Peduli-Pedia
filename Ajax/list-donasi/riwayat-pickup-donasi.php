<?php
    include 'config.php';
    session_start();
    $user = $_SESSION['user'];
    
    $ray = array();

    $deliv = mysqli_query($conn, "SELECT id_donasi, konfirmasi FROM delivery WHERE id_kurir = (SELECT id_kurir FROM kurir WHERE username = '$user')");
    while($delivery = mysqli_fetch_array($deliv)) {
        $id_donasi = $delivery['id_donasi'];
        $konfirmasi = $delivery['konfirmasi'];
        $donasi_bar = mysqli_query($conn, "SELECT id_bencana, nama_barang FROM donasi_barang WHERE id_donasi_barang = '$id_donasi'");
        while($donasi_barang = mysqli_fetch_array($donasi_bar)) {
            $id_bencana = $donasi_barang['id_bencana'];
            $nama_barang = $donasi_barang['nama_barang'];
            $bencana = mysqli_query($conn, "SELECT nama_bencana, lokasi_bencana FROM daftar_bencana WHERE id_bencana = '$id_bencana'");
            while($daftar_bencana = mysqli_fetch_array($bencana)) {
                $nama_bencana = $daftar_bencana['nama_bencana'];
                $lokasi_bencana = $daftar_bencana['lokasi_bencana'];
                array_push($ray, array(
                    'konfirmasi' => $konfirmasi,
                    'nama_barang' => $nama_barang,
                    'nama_bencana' => $nama_bencana,
                    'lokasi_bencana' => $lokasi_bencana
                ));
            }
        }
    }
    echo json_encode($ray);
?>