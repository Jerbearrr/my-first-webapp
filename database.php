<?php
    $servername = "localhost";
    $username = "root";
    $password = "Jerbear#1799";
    $db="books";
    $port = 3306;
    $conn = mysqli_connect($servername, $username, $password,$db, $port);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>