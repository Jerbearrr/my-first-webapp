<?php
    $servername = "localhost";
    $username = "root";
    $password = "Jerbear#1799";
    $db="books";
    $conn = mysqli_connect($servername, $username, $password,$db);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>