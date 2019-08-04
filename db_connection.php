<?php
    $con = mysqli_connect('localhost', 'root', '', 'devo_db');
    if(mysqli_connect_errno()){
        echo "failed " . mysqli_connect_errno();
    }
?>