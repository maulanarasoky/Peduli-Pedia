<?php
    include 'config.php';

    $id_don = $_GET['id'];

    session_start();

    $user = $_SESSION['user'];

    $delete = mysqli_query($conn, "DELETE FROM DONASI_BARANG WHERE ID_DONASI_BARANG = '$id_don'");

    $get = 20;
    $donatur = mysqli_query($conn, "SELECT POIN FROM DONATUR WHERE USERNAME = '$user'");
    foreach($donatur as $value) {
        $newPoin = $value['POIN'] -= $get;
        $sql = mysqli_query($conn, "UPDATE DONATUR SET POIN = $newPoin  WHERE USERNAME='$user'");
    }
?>