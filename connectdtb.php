<?php
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $database = 'cosodulieu';

    $conn = mysqli_connect($server, $user, $pass, $database);

    if($conn) {
        echo "connect successfully";
    } else {
        echo "failed to connect";
    }
  
?>