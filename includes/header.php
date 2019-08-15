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
</head>

<body>