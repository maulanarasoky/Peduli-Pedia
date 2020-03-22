<?php
    include 'config.php';

    session_start();

    $user = $_SESSION['user'];

    if(isset($_SESSION['loginDonatur']) == true) {
        $data = mysqli_query($conn, "SELECT NAMA, USERNAME, EMAIL, POIN, NIK FROM DONATUR WHERE USERNAME = '$user'");
    
        $ray = array();

        while($row = mysqli_fetch_array($data)) {
            $explode = explode(' ', $row['NAMA']);
            array_push($ray, array(
                'nama' => $row['NAMA'],
                'namaDepan' => $explode['0'],
                'namaBelakang' => $explode['1'],
                'username' => $row['USERNAME'],
                'email' => $row['EMAIL'],
                'poin' => $row['POIN'],
                'nik' => $row['NIK'],
            ));
        }
        echo json_encode($ray);   
    } elseif(isset($_SESSION['loginRelawan']) == true) {
        $data = mysqli_query($conn, "SELECT NAMA, USERNAME, EMAIL, POIN, NIK FROM RELAWAN WHERE USERNAME = '$user'");
    
        $ray = array();

        while($row = mysqli_fetch_array($data)) {
            $explode = explode(' ', $row['NAMA']);
            array_push($ray, array(
                'nama' => $row['NAMA'],
                'namaDepan' =>$explode['0'],
                'namaBelakang' =>$explode['1'],
                'username' => $row['USERNAME'],
                'email' => $row['EMAIL'],
                'poin' => $row['POIN'],
                'nik' => $row['NIK']
            ));
        }
        echo json_encode($ray);
    } elseif(isset($_SESSION['loginKurir']) == true) {
        $data = mysqli_query($conn, "SELECT NAMA, USERNAME, EMAIL, POIN, NIK FROM KURIR WHERE USERNAME = '$user'");
    
        $ray = array();
        
        while($row = mysqli_fetch_array($data)) {
            $explode = explode(' ', $row['NAMA']);
            array_push($ray, array(
                'nama' => $row['NAMA'],
                'namaDepan' => $explode['0'],
                'namaBelakang' => $explode['1'],
                'username' => $row['USERNAME'],
                'email' => $row['EMAIL'],
                'poin' => $row['POIN'],
                'nik' => $row['NIK']
            ));
        }
        echo json_encode($ray);
    } elseif(isset($_SESSION['loginPanitia']) == true) {
        $data = mysqli_query($conn, "SELECT NAMA, USERNAME, EMAIL, NIK FROM PANITIA WHERE USERNAME = '$user'");
    
        $ray = array();
        
        while($row = mysqli_fetch_array($data)) {
            $explode = explode(' ', $row['NAMA']);
            array_push($ray, array(
                'nama' => $row['NAMA'],
                'namaDepan' => $explode['0'],
                'namaBelakang' => $explode['1'],
                'username' => $row['USERNAME'],
                'email' => $row['EMAIL'],
                'poin' => 0,
                'nik' => $row['NIK']
            ));
        }
        echo json_encode($ray);
    }
    mysqli_close($conn);
?>