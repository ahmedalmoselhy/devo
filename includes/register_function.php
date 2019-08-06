<?php
$error_array = array();
$username;
if (isset($_POST['reg_btn'])) {

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

    // Validating Email
    if ($email === $email2) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // check email format
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);

            // check if email already exists in the database
            $query = "SELECT email FROM users WHERE email = '$email'";
            $email_check = mysqli_query($con, $query);
            $num_rows = mysqli_num_rows($email_check);
            if ($num_rows > 0) {
                array_push($error_array, "Email already in use");
            }
        } else {
            array_push($error_array, "Invalid Email Format");
        }
    } else {
        array_push($error_array, "Emails don't match");
    }

    // Checking password
    if ($pass === $pass2) {
        if (preg_match('/[^A-Za-z0-9]/', $pass)) {
            array_push($error_array, "Your password can only contain english letters or numbers");
        }
    } else {
        array_push($error_array, "Passwords don't match");
    }
    if (strlen($pass) > 30 || strlen($pass) < 5) {
        array_push($error_array, "Your password must be between 5 and 30 characters");
    }

    // Check name length
    if (strlen($fname) > 25 || strlen($fname) < 2) {
        array_push($error_array, "First name can't be more than 25 characters or less than 2 characters");
    }
    if (strlen($lname) > 25 || strlen($lname) < 2) {
        array_push($error_array, "Last name can't be more than 25 characters or less than 2 characters");
    }
    if (empty($error_array)) {
        // Encrypt password
        $pass = md5($pass);
        // Generate username\
        $username = strtolower($fname . "_" . $lname);
        $check_un = mysqli_query($con, "SELECT username FROM users WHERE username = '$username'");
        $i = 0;
        while (mysqli_num_rows($check_un) != 0) {
            $i++;
            $username = $username . "_" . $i;
            $check_un = mysqli_query($con, "SELECT username FROM users WHERE username = '$username'");
        }
        // Assign default profile picture
        $rand = rand(1, 16);
        $profile_pic = "assets/images/profile_pics/defaults/head_deep_blue.png";


        // insert into database
        $query = "INSERT INTO users VALUES ('','$fname', '$lname', '$username', '$email', '$pass', '$date', '$profile_pic', '0', '0', 'no', ',')";

        $insert = mysqli_query($con, $query);

        // clear session
        $_SESSION['reg_fname'] = "";
        $_SESSION['reg_lname'] = "";
        $_SESSION['reg_email'] = "";
        $_SESSION['reg_email2'] = "";
    }
}
?>