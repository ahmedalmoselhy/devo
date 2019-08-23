<?php
include "db_connection.php";
if(isset($_SESSION['username'])){
    $userLoggedIn = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username = '$userLoggedIn'";
    $userdata = mysqli_query($con, $query);
    $user = mysqli_fetch_array($userdata);
}
else{
    header("Location: register.php");
}
?>
<html>

<head>
    <title>DEVO</title>
    
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>

    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/all.css">
</head>

<body>
    <?php include "includes/nav-bar.php"; ?>
    <div class="wrapper">
        <div class="row">