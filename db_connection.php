<?php
session_start();
ob_start();
$timezone = date_default_timezone_set("Africa/Cairo");
$con = mysqli_connect('localhost', 'root', '', 'devo_db');
if (mysqli_connect_errno()) {
    echo "failed " . mysqli_connect_errno();
}
?>