<?php
$connArray = explode(';', $connectionString);
$connItems = [];

foreach ($connArray as $pair) {
    list ($key, $value) = explode('=', $pair);
    $connItems[$key] = $value;
}
list ($host, $port) = explode(':', $connItems['Data Source']);
$dsn = sprintf(
    'mysql:host=%s;port=%d;dbname=%s',
    $host, $port, $connItems['Database']
);
$conn = mysqli_connect($host, $connItems['User Id'], $connItems['Password'], "books", $port);

echo $host;
echo $connItems['User Id'];
echo $connItems['Password'];
echo $port;
// $servername = "127.0.0.1";
// $username = "azure";
// $password = "6#vWHD_$";
// $db = "books";
// $port = 53815;
// $conn = mysqli_connect($servername, $username, $password, $db, $port);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
