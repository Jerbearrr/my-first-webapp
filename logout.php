<?php
session_start();
unset($_SESSION["firstname"]);
unset($_SESSION["lastname"]);
unset($_SESSION["logintype"]);
header("Location: index.php");
?>