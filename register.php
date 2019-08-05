<?php
include "db_connection.php";
session_start();
$error_array = array();
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

    // store values in session
    $_SESSION['reg_fname'] = $fname;
    $_SESSION['reg_lname'] = $lname;
    $_SESSION['reg_email'] = $email;
    $_SESSION['reg_email2'] = $email2;
    $_SESSION['reg_password'] = $pass;
    $_SESSION['reg_password2'] = $pass2;

    // Validating Email
    if($email === $email2){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            // check email format
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);

            // check if email already exists in the database
            $query = "SELECT email FROM users WHERE email = '$email'";
            $email_check = mysqli_query($con, $query);
            $num_rows = mysqli_num_rows($email_check);
            if($num_rows > 0){
                array_push($error_array, "Email already in use");
            }
        }
        else{
            array_push($error_array, "Invalid Email Format") ;
        }
    }
    else{
        array_push($error_array, "Emails don't match") ;
    }

    // Checking password
    if($pass === $pass2){
        if(preg_match('/[^A-Za-z0-9]/', $pass)){
            array_push($error_array, "Your password can only contain english letters or numbers") ;
        } 
    }
    else{
        array_push($error_array, "Passwords don't match") ;
    }
    if(strlen($pass) > 30 || strlen($pass < 5)){
        array_push($error_array, "Your password must be between 5 and 30 characters") ;
    }

    // Check name length
    if(strlen($fname) > 25 || strlen($fname) < 2){
        array_push($error_array, "First name can't be more than 25 characters or less than 2 characters") ;
    }
    if(strlen($lname) > 25 || strlen($lname) < 2){
        array_push($error_array, "Last name can't be more than 25 characters or less than 2 characters") ;
    }
}
?>
<html>

<head>
    <title>Registeration</title>
</head>

<body>
    <form action="register.php" method="post">
        <input type="text" name="reg_fname" placeholder="First Name" value="<?php 
        if(isset($_SESSION['reg_fname'])){
            echo $_SESSION['reg_fname'];
        } ?>" required>
        <br>
        <?php
        if(in_array("First name can't be more than 25 characters or less than 2 characters", $error_array)){
            echo "First name can't be more than 25 characters or less than 2 characters<br>";
        }
        ?>
        <input type="text" name="reg_lname" placeholder="Last Name" value="<?php 
        if(isset($_SESSION['reg_lname'])){
            echo $_SESSION['reg_lname'];
        } ?>" required>
        <br>
        <?php
        if(in_array("Last name can't be more than 25 characters or less than 2 characters", $error_array)){
            echo "Last name can't be more than 25 characters or less than 2 characters<br>";
        }
        ?>
        <input type="email" name="reg_email" placeholder="Email" value="<?php 
        if(isset($_SESSION['reg_email'])){
            echo $_SESSION['reg_email'];
        } ?>" required>
        <br>
        <?php
        if(in_array("Email already in use", $error_array)){
            echo "Email already in use<br>";
        }
        if(in_array("Invalid Email Format", $error_array)){
            echo "Invalid Email Format<br>";
        }
        ?>
        <input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php 
        if(isset($_SESSION['reg_email2'])){
            echo $_SESSION['reg_email2'];
        } ?>" required>
        <br>
        <?php
        if(in_array("Emails don't match", $error_array)){
            echo "Emails don't match<br>";
        }
        ?>
        <input type="password" name="reg_password" placeholder="Password" required>
        <br>
        <?php
        if(in_array("Your password can only contain english letters or numbers", $error_array)){
            echo "Your password can only contain english letters or numbers<br>";
        }
        if(in_array("Your password must be between 5 and 30 characters", $error_array)){
            echo "Your password must be between 5 and 30 characters<br>";
        }
        ?>
        <input type="password" name="reg_password2" placeholder="Confirm Password" required>
        <br>
        <?php
        if(in_array("Passwords don't match", $error_array)){
            echo "Passwords don't match<br>";
        }
        ?>
        <input type="submit" name="reg_btn" value="Register">
    </form>
</body>

</html>