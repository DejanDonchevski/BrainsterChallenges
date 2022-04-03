<?php 

require_once __DIR__ . "/../helpers/autoload.php";

try {
    $pdo = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USERNAME, PASSWORD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
} catch (PDOException $e) {
    file_put_contents(__DIR__ . "/../../logs.txt", $e->getMessage() . PHP_EOL, FILE_APPEND);
    redirect(PATH."error.php");
}

?>