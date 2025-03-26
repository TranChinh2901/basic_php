<?php
include "connect.php";

//tao bang database
$sql = "CREATE DATABASE cosodulieu";

// kiem tra
if(mysqli_query( $conn, $sql)) {
    echo 'Tao bang moi thanh cong' ;
} else {
    echo " Tao bang moi that bai";
}
?>