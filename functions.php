<?php

session_start();

function redirectTo($page)
{
    header("Location: {$page}");
    die();
}

function errorMsg($error)
{
    $errors = [
        "writing_error" => "There has been an error with writing your informations.",
        "user_not_found" => "Wrong username/password combination.",
        "username_taken" => "Username taken.",
        "email_taken" => "A user with this email already exists.",
        "invalid_username" => "The username can't contain special characters or empty spaces.",
        "invalid_email" => "The email must have at least 5 characters before @",
        "invalid_pass" => "The password must contain at least one number, one special sign and one
        uppercase letter."
    ];

    return $errors[$error];
}

function isPresent($field)
{
    if (strlen($_POST[$field]) == 0 || !isset($_POST[$field])) {

        return false;
    }

    return true;
}

function old($field) {
    return $_POST[$field] ?? '';
}

function isUsernameValid($username) {
    if(ctype_alnum($username))
    {
        return true;
    }

    return false;
}

function isEmailValid($email) {

    $email = $_POST['email'];
    $charsBeforeAt = explode("@", $email);
    
    if(strlen($charsBeforeAt[0]) > 5)
    {
        return true;
    }

    return false;
}

function isPasswordValid($password) {
    $password = $_POST['password'];
    $pattern = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.* )(?=.*^[a-zA-Z0-9]).{8,16}$/m';

    if(preg_match($pattern, $password))
    {
        return true;
    }
    
    return false;
}