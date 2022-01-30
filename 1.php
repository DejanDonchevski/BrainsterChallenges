<?php 

$name = 'Kathrin';
$message = 'Nice name';
$message2 = "Invalid rating, only numbers between 1 and 10.";
$rating = 6;

if($name == 'Kathrin') {
    $message = "Hello $name";
}

echo $message;

echo "<hr />";

if($rating >= 1 && $rating <= 10 ) {
    $message2 = "Thank you for rating.";
}

echo $message2;