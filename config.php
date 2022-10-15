<?php
    $serverName = 'localhost';
    $userName = 'root';
    $password = '';
    $db = 'nss_portal';

    $conn = mysqli_connect($serverName,$userName,$password,$db);
    if(!$conn) die("Connection Error : ".mysqli_connect_error());
?>