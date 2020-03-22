<?php
    include 'config.php';
    session_start();
    $data = json_decode(file_get_contents('php://input'));
    $id_bencana = $data->id_bencana;
    $data_bencana = mysqli_query($conn, "SELECT id_bencana, gambar_bencana, nama_bencana FROM daftar_bencana WHERE id_bencana = '$id_bencana'");
    while($value = mysqli_fetch_array($data_bencana)) {
        $_SESSION['id_bencana'] = $value['id_bencana'];
        $_SESSION['gambar_bencana'] = 'Data:../Images;base64,' . base64_encode($value['gambar_bencana']);
        $_SESSION['nama_bencana'] = $value['nama_bencana'];
    }
    if(isset($_SESSION['loginDonatur']) == true) {
        echo 'Donasi';
    }elseif(isset($_SESSION['loginRelawan']) == true) {
        echo 'Relawan';
    }
?>