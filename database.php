<?php
$AzureConnString = $_SERVER['MYSQLCONNSTR_localdb'];
$AzureConnStringPieces = explode(";", $AzureConnString);

$finalString = implode("&",$AzureConnStringPieces);

parse_str($finalString, $result);

$conn = new mysqli($result['Data Source'], $result['User Id'], $result['Password']);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_close($conn);

// $servername = "127.0.0.1";
// $username = "azure";
// $password = "6#vWHD_$";
// $db = "books";
// $port = 53815;
// $conn = mysqli_connect($servername, $username, $password, $db, $port);
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }
