<?php 

$name = 'Kathrin';
$message = 'Nice name';
$message2 = "Invalid rating, only numbers between 1 and 10.";
$message3 = "Good evening $name";
$message4 = "The value is not an integer";
$rating = 6;
$rated = true;

if($name == 'Kathrin') {
    $message = "Hello $name";
}

echo $message;

echo "<hr />";

if($rating >= 1 && $rating <= 10 ) {
    
    if($rated == false) {
        $message2 = "Thank you for rating.";
    } else {
        $message2 = "You've already rated.";
    }
}

if(is_int($rating)) {
    $message4 = "The value is an integer.";
}

echo $message4;

echo "<br />";

echo $message2;

echo "<hr />";

if(date('H') < 12) {
    $message3 = "Good Morning $name";
} elseif(date('H') < 19) {
    $message3 = "Good Afternoon $name";
} 

echo $message3;