<?php 

require_once __DIR__ . "/helpers/autoload.php";
require_once __DIR__ . "/database/connection.php";

$id = $_GET['id'];
$id = urlencode($id);
$id = urldecode($id);
$id = decrypt($id);


$sql = "SELECT company.*,
cards.img_one, cards.desc_one, cards.img_two, cards.desc_two, cards.img_three, cards.desc_three,
links.linkedin, links.facebook, links.twitter, links.instagram FROM company
JOIN cards ON cards.company_id = company.id 
JOIN links ON links.company_id = company.id WHERE company.id = :company_id";

$stmt = $pdo->prepare($sql);
$stmt->bindValue('company_id', $id);
$stmt->execute();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Webpage</title>
        <!-- Latest compiled and minified Bootstrap 4.4.1 CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!-- Latest Font-Awesome CDN -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php PATH ?>assets/style.css">
    </head>
    <body data-spy="scroll" data-target=".navbar" data-offset="0">
        <?php while($company = $stmt->fetch()) { ?>
        <nav class="navbar navbar-expand-lg navbar-inverse navbar-light bg-light px-4 fixed-top">
            <a class="navbar-brand" href=" <?= PATH ?>index.html">Index</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#NavBar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="NavBar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services"> <?= printOffer($company) ?> </a>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="home" class="text-center text-white p-top" style="background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(<?= $company["cover_img"] ?>) no-repeat center / cover; min-height: 70vh">
            <h1 class="text-light pt-4"><?= $company['main_title'] ?></h1>
            <h2 class="text-light t-subpadding"><?= $company['subtitle'] ?></h2>
        </div>
        <div id="about" class="container text-center p-top">
            <div class="row">
                <div class="col-6 offset-3">
                    <p class="h1 mt-3">About Us</p>
                    <p><?= $company['about_you'] ?></p>
                    <hr>
                    <p class="mb-0">Tel: <?= $company['telephone_num'] ?></p>
                    <p>Location: <?= $company['location'] ?></p>
                </div>
            </div>
        </div>
        <div id="services" class="container p-top">
            <p class="h1 mt-3 m-left"><?= printOffer($company) ?></p>
            <div class="row justify-content-between">
                <div class="col-3">
                    <div class="card size-card border-dark">
                        <img class="card-img-top" src="<?= $company["img_one"] ?>" alt="Card one image">
                        <div class="card-body bg-dark">
                            <p class="h3 card-title text-light"><?= printOffer($company) ?> Description</p>
                            <p class="card-text text-light"><?= $company['desc_one']?></p>
                            <p class="card-text text-light">Last updated 3 mins ago</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card size-card border-dark">
                        <img class="card-img-top" src="<?= $company["img_two"] ?>" alt="Card one image">
                        <div class="card-body bg-dark">
                            <p class="h3 card-title text-light"><?= printOffer($company) ?> Description</p>
                            <p class="card-text text-light"><?= $company['desc_two']?></p>
                            <p class="card-text text-light">Last updated 3 mins ago</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card size-card border-dark">
                        <img class="card-img-top" src="<?= $company["img_three"] ?>" alt="Card one image">
                        <div class="card-body bg-dark">
                            <p class="h3 card-title text-light"><?= printOffer($company) ?> Description</p>
                            <p class="card-text text-light"><?= $company['desc_three']?></p>
                            <p class="card-text text-light">Last updated 3 mins ago</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <div id="contact" class="container">
            <div class="row">
                <div class="col-5 offset-1">
                    <p class="h1 mt-4">Contact</p>
                    <p><?= $company["company_desc"] ?></p>
                </div>
                <div class="col-5 offset-1">
                    <form action="" class="mt-5">
                        <label for="name" class="mb-2">Name</label><br>
                        <input type="text" id="name" name="name" placeholder="Lorem ipsum dolor sit" class="form-control mb-3">
                        <label for="email" class="mb-2">Email</label><br>
                        <input type="email" id="email" name="email" placeholder="Lorem ipsum dolor sit" class="form-control mb-3">
                        <label for="message" class="mb-2">Message</label><br>
                        <textarea name="message" id="message" cols="30" rows="5" placeholder="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit, odio?" class="form-control mb-3"></textarea>
                        <div class="text-center mb-3">
                            <button type="submit" class="btn btn-info text-light">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <footer class="bg-dark text-center">
            <p class="text-light">Copyright by Dejan Donchevski @ Brainster</p>
            <a href="<?= $company["linkedin"] ?>" target="_blank" class="text-decoration-none">Linkedin</a>
            <a href="<?= $company["facebook"] ?>" target="_blank" class="text-decoration-none">Facebook</a>
            <a href="<?= $company["twitter"] ?>" target="_blank" class="text-decoration-none">Twitter</a>
            <a href="<?= $company["instagram"] ?>" target="_blank" class="text-decoration-none">Instagram</a>
        </footer>
        <?php } ?>

        <!-- jQuery library -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        
        <!-- Latest Compiled Bootstrap 4.4.1 JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>