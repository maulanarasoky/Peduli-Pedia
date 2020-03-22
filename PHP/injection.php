<?php
    function injection($data) {
        require "config.php";
        return mysqli_real_escape_string($conn, htmlspecialchars(stripslashes(trim($data))));
    }
?>