<?php

$people = [
"John" => ["voted" => true, "rating" => 6], 
"Michael" => ["voted" => false, "rating" => 10], 
"Maria" => ["voted" => false, "rating" => "great"], 
"David" => ["voted" => false, "rating" => 7], 
"Jane" => ["voted" => false, "rating" => "bad"], 
"Joel" => ["voted" => true, "rating" => 1], 
"Lucy" => ["voted" => false, "rating" => "not good"], 
"Caden" => ["voted" => true, "rating" => 8], 
"Dejan" => ["voted" => false, "rating" => 9], 
"Jenny" => ["voted" => false, "rating" => 5]
];

foreach($people as $voters => $rating) {
    $message = "Good Evening $voters";

    echo "<div>{$voters} =>" . json_encode($rating['voted']) . "," . "{$rating['rating']}</div>";
    if(date('H') < 12) {
        $message = "Good Morning $voters";
    } elseif(date('H') < 19) {
        $message = "Good Afternoon $voters";
    } 

    echo $message;

    echo "<br />";

    $message2 = "Invalid rating, only numbers between 1 and 10.";
    
    if(1 <= $rating['rating'] && $rating['rating'] <= 10) {

        if($rating['voted'] == true) {
            $message2 = "You've already voted with $rating[rating]";
        } else {
            $message2 = "Thank you for voting with $rating[rating]"; 
        }
    }

    echo $message2;

}
