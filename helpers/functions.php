<?php

function redirect($route) {
    header("Location: {$route}");
    die();
}

function checkRequest() {
    if($_SERVER['REQUEST_METHOD'] != "POST") {
        redirect(PATH."error.php");
    }
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
    $_SESSION['errors'] = $errors;
}


/**
 * A function that checks if link is valid, if it is this function returns true in other case function returns false.
 * @return bool
 */
function isValidURL(string $url)
{
    $url = filter_var($url, FILTER_SANITIZE_URL);
    return filter_var($url, FILTER_VALIDATE_URL);
}



function isValidTelephoneNumber(string $number)
{
    if (is_numeric($number) && strlen($number) == 9) {
        return true;
    }
    return false;
}

function old($key) {
    return $_SESSION['old'][$key] ?? '';
}

function errorMessage($key) {
    return $_SESSION['errors'][$key] ?? '' ;
}

function printOffer($company) {
    return $company['offer_id'] == 1 ? "Services" : "Products";
}

/**
 * A function that encrypt given text.
 * @return string
 */
function encrypt($text) 
{
    return openssl_encrypt($text, "AES-128-ECB", ENC_PASSWORD);
}

/**
 * A function that decrypt given text.
 * @return string
 */
function decrypt($text) 
{
    return openssl_decrypt($text, "AES-128-ECB", ENC_PASSWORD);
}