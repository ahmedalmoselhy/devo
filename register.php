<?php
include "db_connection.php";
include "includes/register_handler.php";
include "includes/login_handler.php";
?>
<html>

<head>
    <title>Registeration</title>
</head>

<body>
    <!-- Login Form -->
    <h3>Login</h3>
    <form action="register.php" method="post">
        <input type="email" name="log_email" placeholder="Email Address">
        <br>
        <input type="password" name = "log_password" placeholder="Password">
        <br>
        <input type="submit" name="log_btn" value="Login">
    </form>

    <!-- Register Form -->
    <h3>Register</h3>
    <form action="register.php" method="post">
        <input type="text" name="reg_fname" placeholder="First Name" value="<?php
                                                                            if (isset($_SESSION['reg_fname'])) {
                                                                                echo $_SESSION['reg_fname'];
                                                                            } ?>" required>
        <br>
        <?php
        if (in_array("First name can't be more than 25 characters or less than 2 characters", $error_array)) {
            echo "First name can't be more than 25 characters or less than 2 characters<br>";
        }
        ?>
        <input type="text" name="reg_lname" placeholder="Last Name" value="<?php
                                                                            if (isset($_SESSION['reg_lname'])) {
                                                                                echo $_SESSION['reg_lname'];
                                                                            } ?>" required>
        <br>
        <?php
        if (in_array("Last name can't be more than 25 characters or less than 2 characters", $error_array)) {
            echo "Last name can't be more than 25 characters or less than 2 characters<br>";
        }
        ?>
        <input type="email" name="reg_email" placeholder="Email" value="<?php
                                                                        if (isset($_SESSION['reg_email'])) {
                                                                            echo $_SESSION['reg_email'];
                                                                        } ?>" required>
        <br>
        <?php
        if (in_array("Email already in use", $error_array)) {
            echo "Email already in use<br>";
        }
        if (in_array("Invalid Email Format", $error_array)) {
            echo "Invalid Email Format<br>";
        }
        ?>
        <input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php
                                                                                    if (isset($_SESSION['reg_email2'])) {
                                                                                        echo $_SESSION['reg_email2'];
                                                                                    } ?>" required>
        <br>
        <?php
        if (in_array("Emails don't match", $error_array)) {
            echo "Emails don't match<br>";
        }
        ?>
        <input type="password" name="reg_password" placeholder="Password" required>
        <br>
        <?php
        if (in_array("Your password can only contain english letters or numbers", $error_array)) {
            echo "Your password can only contain english letters or numbers<br>";
        }
        if (in_array("Your password must be between 5 and 30 characters", $error_array)) {
            echo "Your password must be between 5 and 30 characters<br>";
        }
        ?>
        <input type="password" name="reg_password2" placeholder="Confirm Password" required>
        <br>
        <?php
        if (in_array("Passwords don't match", $error_array)) {
            echo "Passwords don't match<br>";
        }
        ?>
        <input type="submit" name="reg_btn" value="Register">
    </form>
</body>
<?php
$error_array = [];
?>
</html>