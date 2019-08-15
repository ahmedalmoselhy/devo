<?php
include "db_connection.php";
if(isset($_SESSION['username'])){
    $userLoggedIn = $_SESSION['username'];
}
else{
    header("Location: register.php");
}
?>
<html>

<head>
    <title>DEVO</title>
    <script src="assets/js/jquery.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <script src="assets/js/bootstrap.js"></script>
</head>

<body>