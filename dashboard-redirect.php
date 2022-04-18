<?php

require_once __DIR__ . "/autoload.php";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $model = isset($_POST['vehicle_model']);
    $vehicle_type = isset($_POST['vehicle_type']);
    $vehicle_chassis = $_POST['vehicle_chassis'];
    $vehicle_production_year = $_POST['vehicle_production_year'];
    $vehicle_registration = $_POST['vehicle_registration'];
    $fuel_type = $_POST['fuel_type'];
    $registrated_to = $_POST['registrated_to'];


    if (strlen($model) == 0 || strlen($vehicle_type) == 0 || strlen($fuel_type) == 0) {
        $_SESSION["errors"] = "Those fields are required";
    }

    $errors = [];
    foreach($_POST as $key=>$value) 
    {
        if(empty($value)) {
            if (isset($value)) {
                $_SESSION[$key] = "This field is required";
            }
        }
    }
    $_SESSION["errors"] = $errors;

    if (count($_SESSION["errors"]) >0) {
        header("location: ./dashboard?errors=true");
        die();
    }
    $sql = "INSERT INTO vehicles(chassis_number, production_year, registration_number, registration_to, vehicle_model_id, vehicle_type_id, fuel_type_id) VALUES(:chassis_number, :production_year, :registration_number, :registration_to, :vehicle_model_id, :vehicle_type_id, :fuel_type_id)";
    
    $stmt = $conn->prepare($sql);

    $stmt->execute([
        ":chassis_number" => $vehicle_chassis,
        ":production_year" => $vehicle_production_year,
        ":registration_number" => $vehicle_registration,
        ":registration_to" => $registrated_to,
        ":vehicle_model_id" => $model,
        ":vehicle_type_id" => $vehicle_type,
        ":fuel_type_id" => $fuel_type,
    ]);

    

    if($stmt->rowCount() > 0) 
    {
        header('location: ./dashboard.php');
        die();
    }
}