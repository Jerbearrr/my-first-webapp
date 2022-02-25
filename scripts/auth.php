<?php
include('../database.php');
$email = '';
$password = '';
$login_type = '';

if (isset($_GET['type']) && isset($_POST['email']) && isset($_POST['password'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $login_type = $_GET['type'];
}

$query = "SELECT * FROM accounts WHERE email = ? AND type= ?;";

$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "ss", $email, $login_type);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$current_user = mysqli_fetch_assoc($result);

if (!password_verify($password, $current_user['password'])) {
    //Wrong credentials   
    header("Location: ../LoginPage.php?error=401&type=$login_type");
} else {
    //Login successful. Creates session of the user.
    session_start();
    $_SESSION['firstname'] = $current_user['firstname'];
    $_SESSION['lastname'] = $current_user['lastname'];
    $_SESSION['logintype'] = $current_user['type'];
    $_SESSION['userId'] = $current_user['id'];

    if ($current_user['type'] == 'admin') {
        header('Location: ../');
    } else if ($current_user['type'] == 'student') {
        header('Location: ../');
    } else {
        die('404: File not Found!');
    }
}
