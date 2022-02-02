<?php
include("../database.php");

if (isset($_POST)) {
    $id = $_GET['id'];
    if (empty($_POST['image'])) {
        $image = $_GET['image'];
    } else {
        $image = $_POST['image'];
    }
    $title = $_POST['title'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];
    $publisher = $_POST['publisher'];
    $description = $_POST['description'];
}
$query = "UPDATE books SET title = ?, author = ?, isbn = ?, publisher = ?, description = ?, image = ? WHERE id = ?;"; 
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'ssssssi', $title, $author, $isbn, $publisher, $description, $image, $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_stmt_errno($stmt)) {
    header("Location: ../ManageBookspageEdit.php?success=false");
    exit();
} else {
    header("Location: ../ManageBookspageEdit.php?success=true");
    exit();
}

mysqli_close($conn);