<?php
include("../database.php");

session_start();

$uid = $_SESSION['userId'];
$oldPass = $_POST['oldPass'];
$newPass = $_POST['newPass'];

$query = "SELECT password FROM accounts WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $uid);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$userPass = mysqli_fetch_row($result)[0];

if (password_verify($oldPass, $userPass)) {
    //Password match
    $query = "UPDATE accounts SET password = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, "si", password_hash($newPass, PASSWORD_DEFAULT), $uid);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_errno($stmt)) {
        //Error in query
        header("Location: ../index.php?success=false");
        exit();
    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }

} else {
    //Password mismatch

	
		$s = $_SERVER['HTTP_REFERER'] ;
$v = 'changepass';
   
function removeqsvar($url, $varname) {
	$url = preg_replace('/(&|\?)'.preg_quote($varname).'=[^&]*$/', '', $url);
    $url = preg_replace('/(&|\?)'.preg_quote($varname).'=[^&]*&/', '$1', $url);
    return $url;
}

$link = removeqsvar($s,$v);
    header("Location: $link?changepass=false");
    exit();
}