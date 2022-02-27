<?php

session_start();

require_once __DIR__ . "/functions.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $_SESSION['username'] = $_POST['username'];
    $data = "{$email},{$username}={$password}";
    $_SESSION['errors'] = [];
    $_SESSION['required'] = [];

    if (!isPresent('username')) {
        $_SESSION['required']['username'] = "required";
    }

    if (!isPresent('password')) {
        $_SESSION['required']['password'] = "required";
    }

    if (!isPresent('email')) {
        $_SESSION['required']['email'] = "required";
    }

    if (count($_SESSION['required']) > 0) {
        $_SESSION['oldusername'] = $username;
        $_SESSION['oldemail'] = $email;

        redirectTo("signup.php");
    }

    if(!isUsernameValid($username))
    {
        $errorMsg = errorMsg("invalid_username");
        array_push($_SESSION['errors'], $errorMsg);
        redirectTo("signup.php");
    }

    if(!isEmailValid($email))
    {
        $errorMsg = errorMsg("invalid_email");
        array_push($_SESSION['errors'], $errorMsg);
        redirectTo("signup.php");
    }

    if(!isPasswordValid($password))
    {
        $errorMsg = errorMsg("invalid_pass");
        array_push($_SESSION['errors'], $errorMsg);
        redirectTo("signup.php");
    }

    $allUsers = explode(PHP_EOL, trim(file_get_contents("users.txt")));

    foreach($allUsers as $user) {
        $user = explode(",", $user);

        $userAndPass = explode("=", $user[1]);

        if ($userAndPass[0] == $username) {
            $errorMsg = errorMsg('username_taken');
            array_push($_SESSION['errors'], $errorMsg);
            redirectTo("signup.php");
        } else if ($user[0] == $email) {
            $errorMsg = errorMsg('email_taken');
            array_push($_SESSION['errors'], $errorMsg);
            redirectTo("signup.php");
        } else {
            if (file_put_contents("users.txt", $data . PHP_EOL, FILE_APPEND)) {
                redirectTo("dashboard.php");
            } else {
                $errorMsg = errorMsg('writing_error');
                array_push($_SESSION['errors'], $errorMsg);
                redirectTo("signup.php");
            }
        }
    }

}