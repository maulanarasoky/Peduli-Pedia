<?php  
    //kode php disini
    session_start();
    include "config.php";
    $id = $_GET['id'];
    if(is_numeric($id)) {
       
            $query = "DELETE FROM ALAMAT_DONATUR WHERE id_alamat = '$id'";
            mysqli_query($conn, $query);
        if(isset($_SESSION['loginRelawan']) == true) {
            $query = "DELETE FROM ALAMAT_RELAWAN WHERE id_alamat = '$id'";
            mysqli_query($conn, $query);
        }
    }
?>

