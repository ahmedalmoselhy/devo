<?php
include "db_connection.php";

if(isset($_POST['reg_btn'])){

    // getting values
    $fname = strip_tags($_POST['reg_fname']);
    $lname = strip_tags($_POST['reg_lname']);
    $email = strip_tags($_POST['reg_email']);
    $email2 = strip_tags($_POST['reg_email2']);
    $pass = strip_tags($_POST['reg_password']);
    $pass2 = strip_tags($_POST['reg_password2']);

    // removing spaces
    $fname = str_replace(' ', '', $fname);
    $lname = str_replace(' ', '', $lname);
    $email = str_replace(' ', '', $email);
    $email2 = str_replace(' ', '', $email2);

    // get date of registery
    $date = date("Y-m-d");
}
?>
<html>

<head>
    <title>Registeration</title>
</head>

<body>
    <form action="register.php" method="post">
        <input type="text" name="reg_fname" placeholder="First Name" required>
        <br>
        <input type="text" name="reg_lname" placeholder="Last Name" required>
        <br>
        <input type="email" name="reg_email" placeholder="Email" required>
        <br>
        <br>
        <input type="email" name="reg_email2" placeholder="Confirm Email" required>
        <br>
        <input type="password" name="reg_password" placeholder="Password" required>
        <br>
        <input type="email" name="reg_password2" placeholder="Confirm Password" required>
        <br>
        <input type="submit" name="reg_btn" value="Register">
    </form>
</body>

</html>