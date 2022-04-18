<?php

function isLogged() {
    if (isset($_SESSION["auth"])) {
        return true;
    }
    return false;
}