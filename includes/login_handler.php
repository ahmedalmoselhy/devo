<?php
$login_error = "";
if(isset($_POST['log_btn'])){
    $email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL);
    $_SESSION['log_email'] = $email;

    $password = md5($_POST['log_password']);

    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $login = mysqli_query($con, $query);

    $check_login = mysqli_num_rows($login);

    if($check_login == 1){
        $row = mysqli_fetch_array($login);
        $username = $row['username'];

        // Reopen closed account
        $query2= "SELECT * FROM users WHERE email = '$email' AND user_closed = 'yes'";
        $check_status = mysqli_query($con, $query2);
        if(mysqli_num_rows($check_status) == 1){
            $query3 = "UPDATE users SET user_closed = 'no' WHERE email = '$email'";
            $reopen = mysqli_query($con, $query3);
        }

        $_SESSION['username'] = $username;
        header("Location: index.php");
    }
    else{
        array_push($error_array, "Email or password was incorrect");
    }
}
?>