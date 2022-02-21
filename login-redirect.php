<?php

session_start();

require __DIR__ . "functions.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_verify($_POST['password'], password_hash($_POST['password'], PASSWORD_DEFAULT));
    $allUsers = explode(PHP_EOL, trim(file_get_contents("users.txt")));

    foreach($allUsers as $users) {
        if($users == "{$username}=={$password}") {
            echo "Logged in";
        }
        else {
            echo "error";
        }
    }
}