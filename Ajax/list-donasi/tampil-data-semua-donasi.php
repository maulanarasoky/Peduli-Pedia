<?php
    include 'config.php';
    session_start();
    $user = $_SESSION['user'];
    
    $ray = array();

    $nama_barang = mysqli_query($conn, "SELECT id_donasi_barang, nama_barang, catatan, id_bencana, id_donatur FROM DONASI_BARANG WHERE STATUS_KHUSUS = 'Belum Diambil'");
    while($donasi = mysqli_fetch_array($nama_barang)) {
        $id = $donasi['id_bencana'];
        $id_donatur = $donasi['id_donatur'];
        $daftar_bencana = mysqli_query($conn, "SELECT NAMA_BENCANA FROM DAFTAR_BENCANA WHERE ID_BENCANA = '$id'");
        while($bencana = mysqli_fetch_array($daftar_bencana)) {
            $user = mysqli_query($conn, "SELECT nama FROM DONATUR WHERE ID_DONATUR = '$id_donatur'");
            while($username = mysqli_fetch_array($user)) {
                array_push($ray, array(
                    'nama_bencana' => $bencana['NAMA_BENCANA'],
                    'nama_barang' => $donasi['nama_barang'],
                    'catatan' => $donasi['catatan'],
                    'id_donasi' => $donasi['id_donasi_barang'],
                    'nama_donatur' => $username['nama']
                ));
            }
        }
    }
    echo json_encode($ray);
?>