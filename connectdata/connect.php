<?php
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $database = 'phpdatabae';

    $conn = new mysqli($server, $user, $pass, $database);
    if($conn) {
        mysqli_query($conn, "SET NAMES 'utf8'");
        echo "connect successfully";
    } else {
        echo "failed to connect";
    }
?>