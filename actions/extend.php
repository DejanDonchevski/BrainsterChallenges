<?php 

require_once __DIR__ . "/../autoload.php";

if($_SERVER['REQUEST_METHOD'] != "POST") {
    header("Location: ../index.php");
    die();
}

if (strlen($_POST["registration_to"]) < 1) {
    $_SESSION["errors"] = "The registration date filed is required!";
    header("Location: ../dashboard.php");
    die();
}

if (strtotime($_POST["registration_to"]) < strtotime(date("Y-m-d"))) { 
    $_SESSION["errors"] = "The registration date can not be in the past!";
    header("Location: ../dashboard.php");
    die();
}

$stmt = $conn->prepare("UPDATE vehicles SET registration_to = ? WHERE vehicles.id = ?;");
$stmt->execute([$_POST["registration_to"], $_GET['id']]);
try {
    if ($stmt->rowCount() > 0) {
        $_SESSION["success"] = "Successfully extended vehicle registration.";
        header("Location: ../dashboard.php");
        die();
    } else {
        $_SESSION["errors"] = "An error ocurred, please try again!";
        header("Location: ../dashboard.php");
        die();
    }
} catch (\PDOException) {
    header("Location: ../404.php");
}