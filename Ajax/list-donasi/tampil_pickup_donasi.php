<?php
    include 'config.php';
    session_start();
    $user = $_SESSION['user'];
    
    $ray = array();

        $id_don = mysqli_query($conn, "SELECT ID_DONASI FROM DELIVERY WHERE ID_KURIR = (SELECT ID_KURIR FROM KURIR WHERE USERNAME = '$user')");
        while($id_dona = mysqli_fetch_array($id_don)) {
            $id_donasi = $id_dona['ID_DONASI'];
            $nama_barang = mysqli_query($conn, "SELECT nama_barang, id_bencana, id_donatur FROM DONASI_BARANG WHERE ID_DONASI_BARANG = '$id_donasi' AND STATUS_KHUSUS = 'Sudah Diambil' AND (STATUS = 'Pending' OR STATUS = 'Sedang Dikirim')");
            while($donasi = mysqli_fetch_array($nama_barang)) {
                $id_bencana = $donasi['id_bencana'];
                $id_donatur = $donasi['id_donatur'];
                $daftar_bencana = mysqli_query($conn, "SELECT NAMA_BENCANA, LOKASI_BENCANA FROM DAFTAR_BENCANA WHERE ID_BENCANA = '$id_bencana'");
                while($bencana = mysqli_fetch_array($daftar_bencana)) {
                    $user = mysqli_query($conn, "SELECT nama FROM DONATUR WHERE ID_DONATUR = '$id_donatur'");
                    while($username = mysqli_fetch_array($user)) {
                        array_push($ray, array(
                            'nama_bencana' => $bencana['NAMA_BENCANA'],
                            'lokasi_bencana' => $bencana['LOKASI_BENCANA'],
                            'nama_barang' => $donasi['nama_barang'],
                            'id_donasi' => $id_donasi,
                            'nama_donatur' => $username['nama']
                        ));
                    }
                }
            }
        }
    
    echo json_encode($ray);
?>