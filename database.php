<?php

$dbname = 'mysql:host=localhost;dbname=challenge17';
    $username = 'root';
    $password = '';
    $options = [];

   try {
    $conn = new PDO($dbname, $username, $password, $options);
}  catch(PDOException $e) {
    echo "<h1>We ran into a problem while connecting to the database, please try again later.</h1>";
}