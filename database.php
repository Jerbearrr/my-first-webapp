<?php
// $servername = "127.0.0.1";
// $username = "azure";
// $password = "6#vWHD_$";
// $db = "books";
// $conn = mysqli_connect($servername, $username, $password, $db);
$connArray = explode(';', $_SERVER['MYSQLCONNSTR_localdb']);
$connItems = [];

foreach ($connArray as $pair) {
    list ($key, $value) = explode('=', $pair);
    $connItems[$key] = $value;
}
list ($host, $port) = explode(':', $connItems['Data Source']);

$conn = mysqli_connect($host, $connItems['User Id'], $connItems['Password'], "books", $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
