<?php

function decimalToBinary($decimalNumber) {
    if($decimalNumber < 0) {
        return "-" . decbin(abs($decimalNumber));
    }

    return decbin($decimalNumber);
}


function decimalToRoman($decimalNumber)
{
    $decimalNumber = abs($decimalNumber);

    $romanNumbers = [
        "M̅" => 1000000,
        "D̅" => 500000,
        "C̅" => 100000,
        "L̅" => 50000,
        "X̅" => 10000,
        "I̅X̅" => 9000,
        "V̅" => 5000,
        "I̅V̅" => 4000,
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

    $romanNumber = '';

    while ($decimalNumber > 0)
    {
        foreach ($romanNumbers as $roman => $decimal)
        {
            if($decimalNumber >= $decimal)
            {
                $decimalNumber -= $decimal;
                $romanNumber .= $roman;
                break;
            }
        }
    }
    return $romanNumber;
}