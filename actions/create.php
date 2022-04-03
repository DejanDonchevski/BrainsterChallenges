<?php

session_start();
require_once __DIR__ . "/../helpers/autoload.php";
require_once __DIR__ . "/../database/connection.php";

checkRequest();

$data = $_POST;

emptyFields($data);

if (!isValidURL($data["cover_img"])) {
    $_SESSION['errors']['invalid_cover_img'] = "Invalid cover image URL";
}

if (!isvalidTelephoneNumber($data["telephone_num"])) {
    $_SESSION['errors']['invalid_telephone_num'] = "Invalid telephone number format!";
}

if (!isValidURL($data["img_one"])) {
    $_SESSION['errors']['invalid_img_one'] = "Invalid image URL";
}

if (!isValidURL($data["img_two"])) {
    $_SESSION['errors']['invalid_img_two'] = "Invalid image URL";
}

if (!isValidURL($data["img_three"])) {
    $_SESSION['errors']['invalid_img_three'] = "Invalid image URL";
}

if (!isValidURL($data["linkedin"])) {
    $_SESSION['errors']['invalid_linkedin_url'] = "Invalid URL";
}

if (!isValidURL($data["facebook"])) {
    $_SESSION['errors']['invalid_facebook_url'] = "Invalid URL";
}

if (!isValidURL($data["twitter"])) {
    $_SESSION['errors']['invalid_twitter_url'] = "Invalid URL";
}

if (!isValidURL($data["instagram"])) {
    $_SESSION['errors']['invalid_instagram_url'] = "Invalid URL";
}

if (!isset($_POST['offer_id'])) {
    $_SESSION['errors']["offer_id"] = "This field is required! Please select type.";
}

if (count($_SESSION['errors']) > 0) {
    $_SESSION['old'] = $data;
    redirect(PATH."form.php");
}

$data = $_POST;

$sql = "INSERT INTO `company` (cover_img, main_title, subtitle, about_you, telephone_num, location, offer_id, company_desc)
VALUES (:cover_img, :main_title, :subtitle, :about_you, :telephone_num, :location, :offer_id, :company_desc)";

$stmt = $pdo->prepare($sql);

$stmt->bindValue('cover_img', $_POST['cover_img']);
$stmt->bindValue('main_title', $_POST['main_title']);
$stmt->bindValue('subtitle', $_POST['subtitle']);
$stmt->bindValue('about_you', $_POST['about_you']);
$stmt->bindValue('telephone_num', $_POST['telephone_num']);
$stmt->bindValue('location', $_POST['location']);
$stmt->bindValue('offer_id', $_POST['offer_id']);
$stmt->bindValue('company_desc', $_POST['company_desc']);

try {
    if($stmt->execute()) {
        $lastInsertedID = $pdo->lastInsertId();
        $sql = "INSERT INTO `cards` (company_id, img_one, desc_one, img_two, desc_two, img_three, desc_three) 
        VALUES (:company_id, :img_one, :desc_one, :img_two, :desc_two, :img_three, :desc_three)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('company_id', $lastInsertedID);
        $stmt->bindValue('img_one', $_POST['img_one']);
        $stmt->bindValue('desc_one', $_POST['desc_one']);
        $stmt->bindValue('img_two', $_POST['img_two']);
        $stmt->bindValue('desc_two', $_POST['desc_two']);
        $stmt->bindValue('img_three', $_POST['img_three']);
        $stmt->bindValue('desc_three', $_POST['desc_three']);

        if($stmt->execute()) {
            $sql = "INSERT INTO `links` (company_id, linkedin, facebook, twitter, instagram) 
            VALUE (:company_id, :linkedin, :facebook, :twitter, :instagram)";

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue('company_id', $lastInsertedID);
            $stmt->bindValue('linkedin', $_POST['linkedin']);
            $stmt->bindValue('facebook', $_POST['facebook']);
            $stmt->bindValue('twitter', $_POST['twitter']);
            $stmt->bindValue('instagram', $_POST['instagram']);
            if($stmt->execute()) {
                $id = encrypt($lastInsertedID);
                $id = urlencode($id);
                redirect(PATH."website.php?id={$id}");
            }
        }
    }
} catch (PDOException $e) {
    redirect(PATH."error.php");
}

?>