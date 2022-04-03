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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
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
        <div id="home" class="text-center text-white top-padding" style="background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(<?= $company["cover_img"] ?>) no-repeat center / cover; min-height: 70vh">
            <p class="f-35 text-light pt-4"><?= $company['main_title'] ?></p>
            <p class="f-25 text-light padding-t"><?= $company['subtitle'] ?></p>
        </div>
        <div id="about" class="container text-center top-padding">
            <div class="row">
                <div class="col-6 offset-3">
                    <p class="f-30 mt-3">About Us</p>
                    <p><?= $company['about_you'] ?></p>
                    <hr>
                    <p class="mb-0">Tel: <?= $company['telephone_num'] ?></p>
                    <p>Location: <?= $company['location'] ?></p>
                </div>
            </div>
        </div>
        <div id="services" class="container top-padding">
            <p class="f-30 mt-3 m-left"><?= printOffer($company) ?></p>
            <div class="row justify-content-evenly">
                <div class="col-3">
                    <div class="card card-size border-dark">
                        <img class="card-img-top" src="<?= $company["img_one"] ?>" alt="Card one image">
                        <div class="card-body bg-dark">
                            <p class="f-20 card-title text-light"><?= printOffer($company) ?> Description</p>
                            <p class="card-text f-15 text-light"><?= $company['desc_one']?></p>
                            <p class="card-text f-15 text-light">Last updated 3 mins ago</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card card-size border-dark">
                        <img class="card-img-top" src="<?= $company["img_two"] ?>" alt="Card one image">
                        <div class="card-body bg-dark">
                            <p class="f-20 card-title text-light"><?= printOffer($company) ?> Description</p>
                            <p class="card-text f-15 text-light"><?= $company['desc_two']?></p>
                            <p class="card-text f-15 text-light">Last updated 3 mins ago</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card card-size border-dark">
                        <img class="card-img-top" src="<?= $company["img_three"] ?>" alt="Card one image">
                        <div class="card-body bg-dark">
                            <p class="f-20 card-title text-light"><?= printOffer($company) ?> Description</p>
                            <p class="card-text f-15 text-light"><?= $company['desc_three']?></p>
                            <p class="card-text f-15 text-light">Last updated 3 mins ago</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <div id="contact" class="container">
            <div class="row">
                <div class="col-5 offset-1">
                    <p class="f-30 mt-4">Contact</p>
                    <p><?= $company["company_desc"] ?></p>
                </div>
                <div class="col-5 offset-1">
                    <form action="" class="mt-5">
                        <label for="name" class="mb-2">Name</label><br>
                        <input type="text" id="name" name="name" placeholder="Dicta iste et asperi" class="form-control mb-3">
                        <label for="email" class="mb-2">Email</label><br>
                        <input type="email" id="email" name="email" placeholder="Iste impedit asperi" class="form-control mb-3">
                        <label for="message" class="mb-2">Message</label><br>
                        <textarea name="message" id="message" cols="30" rows="5" placeholder="Eligendi neque qua quaerat sunt consequatur Voluptates quae enim vitae" class="form-control mb-3"></textarea>
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
    </body>
</html>