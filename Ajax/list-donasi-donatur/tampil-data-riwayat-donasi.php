<?php
    include 'config.php';
    session_start();
    $user = $_SESSION['user'];
    
    $ray = array();

    $account = mysqli_query($conn, "SELECT id_donatur FROM DONATUR WHERE USERNAME = '$user'");
    while($acc = mysqli_fetch_array($account)) {
        $id_donatur = $acc['id_donatur'];
        $delivery = mysqli_query($conn, "SELECT id_donasi, id_bencana FROM delivery WHERE konfirmasi = 'Sudah Dikonfirmasi'");
        while($deliv = mysqli_fetch_array($delivery)) {
            $id_donasi = $deliv['id_donasi'];
            $id_bencana = $deliv['id_bencana'];
            $donasi_barang = mysqli_query($conn, "SELECT nama_barang, catatan FROM DONASI_BARANG WHERE ID_DONASI_BARANG = '$id_donasi' AND STATUS = 'Sudah Sampai' AND STATUS_KHUSUS = 'Sudah Diambil' AND ID_DONATUR = '$id_donatur'");
            while($donasi = mysqli_fetch_array($donasi_barang)) {
                $daftar_bencana = mysqli_query($conn, "SELECT nama_bencana FROM daftar_bencana WHERE id_bencana = '$id_bencana'");
                while($bencana = mysqli_fetch_array($daftar_bencana)) {
                    $user = mysqli_query($conn, "SELECT nama FROM donatur WHERE ID_DONATUR = '$id_donatur'");
                    while($username = mysqli_fetch_array($user)) {
                        array_push($ray, array(
                            'nama_bencana' => $bencana['nama_bencana'],
                            'nama_barang' => $donasi['nama_barang'],
                            'catatan' => $donasi['catatan'],
                            'id_donasi' => $deliv['id_donasi'],
                            'nama_donatur' => $username['nama']
                        ));
                    }
                }
            }
        }
    }
    echo json_encode($ray);
?>