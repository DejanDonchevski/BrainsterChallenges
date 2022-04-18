<?php

require_once __DIR__ . "/autoload.php";
require_once __DIR__ . "/assets/navbar.php";

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Register your vehicle</title>
        <meta charset="utf-8" />
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />

        <!-- Latest compiled and minified Bootstrap 4.4.1 CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!-- Latest Font-Awesome CDN -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    </head>
    <body>
        
        
        <div class="container mt-5 text-center">
            <div class="jumbotron">
                <h1 class="display-4">Vehicle Registration</h1>
                <form action="./index.php" method="POST">
                    <div class="form-group">
                        <label class="lead" for="registration">Enter your registration number to check its validity</label>
                        <input type="text" name="registration" id="registration" class="form-control" placeholder="Registration number">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>
        <?php 
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
        ?>
        <div class="container-liquid text-center">
            <div class="row">
                <div class="col-10 offset-1">
                    <div class="card">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">vehicle model</th>
                                    <th scope="col">vehicle type</th>
                                    <th scope="col">vehicle chassis number</th>
                                    <th scope="col">vehicle production year</th>
                                    <th scope="col">registration number</th>
                                    <th scope="col">registration to</th>
                                    <th scope="col">fuel type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $stmt3 = $conn->prepare("SELECT vehicles.*, models.model, types.type, fuels.fuel FROM vehicles
                                JOIN models ON vehicles.vehicle_model_id = models.id
                                JOIN types ON vehicles.vehicle_type_id	= types.id
                                JOIN fuels ON vehicles.fuel_type_id = fuels.id WHERE vehicles.registration_number = ? ORDER BY id ASC;");
                                $stmt3->execute([$_POST['registration']]);

                                if($stmt3->rowCount() > 0) 
                                {
                                    while($vehicle = $stmt3->fetch()) 
                                    {   ?> 
                                    <tr>
                                        <td><?=$vehicle['id']?></td>
                                        <td><?=$vehicle['model']?></td>
                                        <td><?=$vehicle['type']?></td>
                                        <td><?=$vehicle['chassis_number']?></td>
                                        <td><?=$vehicle['production_year']?></td>
                                        <td><?=$vehicle['registration_number']?></td>
                                        <td><?=$vehicle['registration_to']?></td>
                                        <td><?=$vehicle['fuel']?></td>
                                    </tr>
                                <?php }
                                } else {
                                    echo "No vehicles found";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>                                
        <!-- jQuery library -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        
        <!-- Latest Compiled Bootstrap 4.4.1 JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>