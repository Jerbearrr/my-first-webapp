<?php
    $servername = "127.0.0.1";
    $username = "azure";
    $password = "6#vWHD_$";
    $db="books";
    $port = 53720;
    $conn = mysqli_connect(MYSQLCONNSTR_localdb);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>