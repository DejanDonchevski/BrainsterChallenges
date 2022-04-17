<?php
require_once __DIR__ . "/autoload.php";
require_once __DIR__ . "/assets/navbar.php";

$sql = "SELECT * FROM models WHERE 1";
$sql1 = "SELECT * FROM types WHERE 1";
$sql2 = "SELECT * FROM fuels WHERE 1";

$stmt = $conn->query($sql);
$stmt1 = $conn->query($sql1);
$stmt2 = $conn->query($sql2);

if($_SERVER['REQUEST_METHOD'] == 'GET') 
{
    if(isset($_GET['id']))
    {
        $stmt = $conn->prepare('DELETE FROM vehicles WHERE id = ?;');
        $stmt->execute([$_GET['id']]);
        if($stmt->rowCount() > 0) {
            echo "Successfully deleted";
            header('location: ./dashboard.php');
            die();
        }
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Document</title>
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
        
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="display-4 h1 p-4">Vehicle Registration</p>
                </div>
                <div class="col-10 offset-1">
                    <form action="./dashboard-redirect.php" method="POST" class="container-liquid p-5">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="vehicle_model">Vehicle Model</label>
                                    <select class="form-select form-control" name="vehicle_model" id="vehicle_model">
                                        <option selected disabled>Select the vehicle model</option>
                                        <?php
                                            while($models = $stmt->fetch()) {
                                                echo "<option value='{$models['id']}'>{$models['model']}</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="vehicle_type">Vehicle Type</label>
                                    <select class="form-select form-control" name="vehicle_type" id="vehicle_type">
                                        <option selected disabled>Select the vehicle type</option>
                                        <?php
                                        while($types = $stmt1->fetch()) {
                                            echo "<option value='{$types['id']}'>{$types['type']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="vehicle_chassis">Vehicle chassis number</label>
                                    <input type="text" name="vehicle_chassis" id="vehicle_chassis" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="vehicle_production_year">Vehicle production year</label>
                                    <input type="date" name="vehicle_production_year" id="vehicle_production_year" class="form-control" placeholder="mm/dd/yyyy">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="vehicle_registration">Vehicle registration number</label>
                                    <input type="text" name="vehicle_registration" id="vehicle_registration" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="fuel_type">Fuel Type</label>
                                    <select class="form-select form-control" name="fuel_type" id="fuel_type">
                                        <option selected disabled>Select the fuel type</option>
                                        <?php
                                        while($fuels = $stmt2->fetch()) {
                                            echo "<option value='{$fuels['id']}'>{$fuels['fuel']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="registrated_to">Registrated to</label>
                                    <input type="date" name="registrated_to" id="registrated_to" class="form-control" placeholder="mm/dd/yyyy">
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="form-group">
                                    <button class="btn btn-primary form-control mt-3">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container-liquid text-center">
            <div class="row">
                <div class="col-10 offset-1">
                    <div class="card">
                        <div class="card-header">
                            <form action="" class="container-liquid mb-0">
                                <div class="row justify-content-end">
                                    <div class="col-5">
                                        <input type="text" placeholder="Search..." class="form-control w-75 d-inline-block mr-4">
                                        <button class="btn btn-primary mb-1">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
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
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $stmt3 = $conn->query("SELECT vehicles.*, models.model, types.type, fuels.fuel FROM vehicles
                                JOIN models ON vehicles.vehicle_model_id = models.id
                                JOIN types ON vehicles.vehicle_type_id	= types.id
                                JOIN fuels ON vehicles.fuel_type_id = fuels.id WHERE 1 ORDER BY id ASC;");
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
                                        <td>
                                            <a href="./dashboard.php?id=<?=$vehicle['id']?>" class="btn btn-sm btn-danger">Delete</a>
                                            <a href="./edit.php?id=<?=$vehicle['id']?>" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="<?=$vehicle['id']?>" class="btn btn-sm btn-success">Extend</a>
                                        </td>
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
        
        <!-- jQuery library -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        
        <!-- Latest Compiled Bootstrap 4.4.1 JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>