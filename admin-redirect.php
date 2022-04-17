<?php

require_once __DIR__ . "/autoload.php";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $model = $_POST['vehicle_model'];
    $vehicle_type = $_POST['vehicle_type'];
    $vehicle_chassis = $_POST['vehicle_chassis'];
    $vehicle_production_year = $_POST['vehicle_production_year'];
    $vehicle_registration = $_POST['vehicle_registration'];
    $fuel_type = $_POST['fuel_type'];
    $registrated_to = $_POST['registrated_to'];

    foreach($_POST as $key=>$value) 
    {
        if(empty($field)) {
            $_SESSION['error'][$key] = "This field is required";
        }
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
        header('location: ./admin.php');
        die();
    }
}