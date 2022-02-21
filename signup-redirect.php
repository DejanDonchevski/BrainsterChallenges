<?php

session_start();

require_once __DIR__ . "/functions.php";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $_SESSION['username'] = $_POST['username'];
    $data = "$username=$password" . PHP_EOL;
    $_SESSION['errors'] = [];

    if(file_put_contents('users.txt', $data, FILE_APPEND)) 
    {
        redirectTo("dashboard.php");
    } else {
        $errorMsg = errorMsg('writing_error');
        array_push($_SESSION['errors'], $errorMsg);
        redirectTo("signup.php");
    }
}