<?php
require_once __DIR__ . "./autoload.php";

try {
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $stmt->execute([$_POST["email"], $_POST["email"]]);
    if ($stmt->rowCount() == 0) {
        $_SESSION["oldData"] = $_POST;
        $_SESSION["errors"] = "Wrong login credentials";
        header("Location: ./login.php");
        die();
    }

    $user = $stmt->fetch();
    if (password_verify($_POST["password"], $user["password"])) {
        $_SESSION["auth"] = $user;
        header("Location: ./dashboard.php");
    } else {
        $_SESSION["oldData"] = $_POST;
        $_SESSION["errors"] = "Wrong login credentials";
        header("Location: ./login.php");
    } 
} catch (\PDOException) {
    header("Location: ./login.php");
}
