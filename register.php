<?php
include "db_connection.php";
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