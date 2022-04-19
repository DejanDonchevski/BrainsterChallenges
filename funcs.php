<?php

function isLogged() {
    if (isset($_SESSION["auth"])) {
        return true;
    }
    return false;
}

function emptyFields($data)
{
    $errors = [];

    foreach ($data as $key => $value) {
        if (isset($value)) {
            if (empty($value)) {
                $errors[$key] = "This field is required!";
            } 
        }
    }
    $_SESSION['fields'] = $errors;
}