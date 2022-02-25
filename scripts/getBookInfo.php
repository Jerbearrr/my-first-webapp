<?php

include("../database.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$query = "SELECT * FROM books where id = ?;";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$stmt_result = mysqli_stmt_get_result($stmt);

while ($result = mysqli_fetch_assoc($stmt_result)) {
    $link = "../ManageBookspageEdit.php?id=" . $result['id'] . "&image=" . $result['image'] . "&title=" . $result['title'] . "&author=" . $result['author'] . "&isbn=" . $result['isbn'] . "&publisher=" . $result['publisher'] . "&description=" . $result['description'];

    header("Location: " . $link);
}
mysqli_close($conn);
