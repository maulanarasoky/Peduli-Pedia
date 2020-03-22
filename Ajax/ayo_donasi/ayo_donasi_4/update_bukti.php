<?php
    include 'config.php';
    
    session_start();

    $user = $_SESSION['user'];

    $data = json_decode(file_get_contents('php://input'));    
    $bukti = $data->bukti;
    
    $bukti = mysqli_query($conn, "UPDATE DONASI_UANG SET BUKTI_TRANSFER = ")
?>