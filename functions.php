<?php

function redirectTo($page) 
{
    header("Location: {$page}");
    die();
}

function errorMsg($error) 
{
    $errors = [
        "writing_error" => "There has been an error with the information you entered.",
    ];

    return $errors[$error];
}