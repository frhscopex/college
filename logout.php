<?php
include "dbcon.php";
$_SESSION['id'];
$_SESSION['username']

session_unset();
session_destroy();
header('location:login.php');
?>