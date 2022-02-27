<?php

session_start();

require __DIR__ . "/functions.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $allUsers = [];
    $allUsers = explode(PHP_EOL, trim(file_get_contents("users.txt")));
    $_SESSION['errors'] = [];

    foreach($allUsers as $users) {
        $users = explode(",", $users);

        $userAndPass = explode("=", $users[1]);

        if($userAndPass[0] == $username && password_verify($password, $userAndPass[1]))
        {
            $_SESSION['username'] = $username;
            redirectTo("dashboard.php");
        }

        $errorMsg = errorMsg("user_not_found");
        array_push($_SESSION['errors'], $errorMsg);
        redirectTo("login.php");
        
    }
}       