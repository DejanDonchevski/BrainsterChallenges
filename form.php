<?php

require_once __DIR__ . "/helpers/autoload.php";
require_once __DIR__ . "/database/connection.php";


$sql = "SELECT offers.*, company.offer_id AS company_offer 
        FROM offers JOIN company ON offers.id = company.offer_id
        WHERE 1=1 ";

if(isset($_POST['company_offer']) && $_POST['company_offer'] != 0) {
    $sql .= "AND offers.id = :offer_id ";
}

try {
    $stmt = $pdo->prepare($sql);
    if(isset($_POST['company_offer']) && $_POST['company_offer'] != 0) {
        $stmt->bindValue('offer_id', $_POST['comapny_offer']);
    }

    $stmt->execute();
} catch(PDOException $e) {
    redirect(PATH."error.php");
}


$sqlAllOffers = "SELECT * FROM `offers` WHERE 1";
$stmtAllOffers = $pdo->query($sqlAllOffers);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Form</title>
        <meta charset="utf-8" />
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <style>
            .cover-img {
                background-image: url("./img/collaborative-work-enviroment-min.jpg");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                height: 100vh;
            }
        </style>

        <!-- Latest compiled and minified Bootstrap 4.4.1 CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!-- Latest Font-Awesome CDN -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    </head>
    <body>
        
    <div class="form-background cover-img">
            <h1 class="f-30 text-white text-center py-3">You are one step away from your webpage</h1>
            <div class="container-fluid">
                <form method="POST" action="<?php PATH ?>actions/create.php">
                    <div class="d-flex">
                        <div class="row justify-content-center align-items-start">
                            <div class="col-3">
                                <div class="form-row bg-light rounded p-3 mb-3">
                                    <div class="mb-2">
                                        <label for="cover_img" class="form-label">Cover Image URL</label>
                                        <input type="text" id="cover_img" name="cover_img" class="form-control">
                                        <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('cover_img', $_SESSION['errors']) ? $_SESSION['errors']['cover_img'] : '' ; ?></small>
                                        <small class="form-text text-danger"><?= errorMessage('invalid_cover_img') ?></small>
                                    </div>
                                    <div class="mb-2">
                                        <label for="main_title" class="form-label">Main Title of Page</label>
                                        <input type="text" id="main_title" name="main_title" class="form-control">
                                        <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('main_title', $_SESSION['errors']) ? $_SESSION['errors']['main_title'] : '' ; ?></small>
                                    </div>
                                    <div class="mb-2">
                                        <label for="subtitle" class="form-label">Subtitle of Page</label>
                                        <input type="text" id="subtitle" name="subtitle" class="form-control">
                                        <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('subtitle', $_SESSION['errors']) ? $_SESSION['errors']['subtitle'] : '' ; ?></small>
                                    </div>
                                    <div class="mb-2">
                                        <label for="about_you" class="form-label">Something about you</label>
                                        <textarea id="about_you" name="about_you" cols="30" rows="2" class="form-control"></textarea>
                                        <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('about_you', $_SESSION['errors']) ? $_SESSION['errors']['about_you'] : '' ; ?></small>
                                    </div>
                                    <div class="mb-2">
                                        <label for="telephone_num" class="form-label">Your telephone number</label>
                                        <input type="tell" id="telephone_num" name="telephone_num" class="form-control">
                                        <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('telephone_num', $_SESSION['errors']) ? $_SESSION['errors']['telephone_num'] : '' ; ?></small><br>
                                    <small class="form-text text-danger"><?= errorMessage('invalid_telephone_num') ?></small>
                                    </div>
                                    <div class="mb-4">
                                        <label for="location" class="form-label">Location</label>
                                        <input type="text" id="location" name="location" class="form-control">
                                        <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('location', $_SESSION['errors']) ? $_SESSION['errors']['location'] : '' ; ?></small>
                                    </div>
                                </div>
                                <div class="form-row bg-light rounded p-3">
                                    <div class="mb-2">
                                        <label for="offer_id" class="form-label">Do you provide services or products?</label>
                                        <select name="offer_id" id="offer_id" class="form-control">
                                        <option selected disabled>Please select...</option>
                                        <?php 
                                            while($offer = $stmtAllOffers->fetch()) {
                                                $selected = (isset($_POST['company_offer']) && $offer['company_offer'] == $offer['id']) ? 'selected' : '';
                                                echo "<option value='{$offer['id']}' {$selected}>{$offer['services_products']}</option>";
                                            }
                                        ?>
                                        </select>
                                        <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('offer_id', $_SESSION['errors']) ? $_SESSION['errors']['offer_id'] : '' ; ?></small>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-row bg-light rounded p-3 mb-3">
                                    <p class="f-14">Provide url for an image and description of your service/product</p>
                                    <div class="mb-2">
                                        <label for="img_one" class="form-label">Image URL</label>
                                        <input type="text" id="img_one" name="img_one" class="form-control">
                                        <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('img_one', $_SESSION['errors']) ? $_SESSION['errors']['img_one'] : '' ; ?></small>
                                        <small class="form-text text-danger"><?= errorMessage('invalid_img_one') ?></small>
                                    </div>
                                    <div class="mb-2">
                                        <label for="desc_one" class="form-label">Description of service/product</label>
                                        <textarea name="desc_one" id="desc_one" cols="30" rows="2" class="form-control"></textarea>
                                        <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('desc_one', $_SESSION['errors']) ? $_SESSION['errors']['desc_one'] : '' ; ?></small>
                                    </div>
                                    <div class="mb-2">
                                        <label for="img_two" class="form-label">Image URL</label>
                                        <input type="text" id="img_two" name="img_two" class="form-control">
                                        <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('img_two', $_SESSION['errors']) ? $_SESSION['errors']['img_two'] : '' ; ?></small>
                                        <small class="form-text text-danger"><?= errorMessage('invalid_img_two') ?></small>
                                    </div>
                                    <div class="mb-2">
                                        <label for="desc_two" class="form-label">Description of service/product</label>
                                        <textarea id="desc_two" name="desc_two" cols="30" rows="2" class="form-control"></textarea>
                                        <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('desc_two', $_SESSION['errors']) ? $_SESSION['errors']['desc_two'] : '' ; ?></small>
                                    </div>
                                    <div class="mb-2">
                                        <label for="img_three" class="form-label">Image URL</label>
                                        <input type="text" id="img_three" name="img_three" class="form-control">
                                        <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('img_three', $_SESSION['errors']) ? $_SESSION['errors']['img_three'] : '' ; ?></small>
                                        <small class="form-text text-danger"><?= errorMessage('invalid_img_three') ?></small>
                                    </div>
                                    <div class="mb-4">
                                        <label for="desc_three" class="form-label">Description of service/product</label>
                                        <textarea id="desc_three" name="desc_three" cols="30" rows="2" class="form-control"></textarea>
                                        <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('desc_three', $_SESSION['errors']) ? $_SESSION['errors']['desc_three'] : '' ; ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-row bg-light rounded p-3 mb-3">
                                    <div class="mb-5">
                                        <label for="company_desc" class="form-label">Provide a description of your company, something people shoud be aware of before they contact you:</label>
                                        <textarea name="company_desc" id="company_desc" cols="30" rows="2" class="form-control"></textarea>
                                        <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('company_desc', $_SESSION['errors']) ? $_SESSION['errors']['company_desc'] : '' ; ?></small>
                                    </div>
                                    <div class="mb-2">
                                        <label for="linkedin" class="form-label">Linkedin</label>
                                        <input type="text" id="linkedin" name="linkedin" class="form-control">
                                        <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('linkedin', $_SESSION['errors']) ? $_SESSION['errors']['linkedin'] : '' ; ?></small>
                                    <small class="form-text text-danger"><?= errorMessage('invalid_linkedin_url') ?></small>
                                    </div>
                                    <div class="mb-2">
                                        <label for="facebook" class="form-label">Facebook</label>
                                        <input type="text" id="facebook" name="facebook" class="form-control">
                                        <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('facebook', $_SESSION['errors']) ? $_SESSION['errors']['facebook'] : '' ; ?></small>
                                        <small class="form-text text-danger"><?= errorMessage('invalid_facebook_url') ?></small>
                                    </div>
                                    <div class="mb-2">
                                        <label for="twitter" class="form-label">Twitter</label>
                                        <input type="text" id="twitter" name="twitter" class="form-control">
                                        <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('twitter', $_SESSION['errors']) ? $_SESSION['errors']['twitter'] : '' ; ?></small>
                                        <small class="form-text text-danger"><?= errorMessage('invalid_twitter_url') ?></small>
                                    </div>
                                    <div class="mb-2">
                                        <label for="instagram" class="form-label">Instagram</label>
                                        <input type="text" id="instagram" name="instagram" class="form-control">
                                        <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('instagram', $_SESSION['errors']) ? $_SESSION['errors']['instagram'] : '' ; ?></small>
                                        <small class="form-text text-danger"><?= errorMessage('invalid_instagram_url') ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-secondary px-5">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- jQuery library -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        
        <!-- Latest Compiled Bootstrap 4.4.1 JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>