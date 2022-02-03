<?php 

function binaryToDecimal($binaryNumber) {
    return bindec($binaryNumber);
}

function romanToDecimal($romanNumber) {

    $romanNumbers = [
        "M" => 1000,
        "CM" => 900,
        "D" => 500,
        "CD" => 400,
        "C" => 100,
        "XC" => 90,
        "L" => 50,
        "XL" => 40,
        "X" => 10,
        "IX" => 9,
        "VIII" => 8,
        "VII" => 7,
        "VI" => 6,
        "V" => 5,
        "IV" => 4,
        "III" => 3,
        "II" => 2,
        "I" => 1,

    ];

    $result = 0;

    foreach($romanNumbers as $key => $value) {

        while(strpos($romanNumber, $key) === 0) {
            $result += $value;
            $romanNumber = substr($romanNumber, strlen($key));
        }

    }

    return $result;
}

echo romanToDecimal('MMCCXV');
echo "<br />";
echo binaryToDecimal('011001');
