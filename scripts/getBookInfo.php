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
    $link = "../ManageBookspageEdit.php?id=" . urlencode($result['id']) . "&image=" . urlencode($result['image']) . "&title=" . urlencode($result['title']) . "&author=" . urlencode($result['author']) . "&isbn=" . urlencode($result['isbn']) . "&publisher=" . urlencode($result['publisher']) . "&description=" . urlencode($result['description']);

    header("Location: " . $link);
}
mysqli_close($conn);
