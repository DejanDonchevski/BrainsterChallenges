<?php

include 'index1.php';
include 'index2.php';


function isNum($num)
{

    if (preg_match("/[a-z]/", $num) && preg_match("/[0-9]/", $num)) {
        return false;
    }
    else if (preg_match("/[a-z]/", $num) && preg_match("/[A-Z]/", $num))
    {
        return false;
    }
    else if (preg_match("/[A-Z]/", $num) && preg_match("/[0-9]/", $num))
    {
        return false;
    }

    return true;
}

function isValidNum($num)
{
    if (substr($num, 0, 1) == "+" || substr($num, 0, 1) == "-") {
        if (substr($num, 0, 2) == "0") {
            return false;
        }
    }
    if (preg_match("/[2-9]/", $num)) {
        if (substr($num, 0, 1) == "0") {
            return false;
        }
    }
    return true;
}


function isBinary($num)
{
    if (isValidNum($num)) {
        if (substr($num, 0, 1) == "+" || substr($num, 0, 1) == "-") {
            return false;
        }
        else
        {
            if (preg_match("/[0-1]/", $num) && !preg_match("/[2-9]/", $num)) {
                return true;
            }
        }
    }
    
}


function isDecimal($num)
{
    if (isValidNum($num)) {
        if (preg_match("/[0-9]/", $num) && !preg_match("/[A-Z]/", $num)) {
            return true;
        }
    }
}

function typeNum($num)
{
    if(isNum($num))
    {
        if(isValidNum($num))
        {
            if(isBinary($num))
            {
                echo "The number {$num} is binary.";
            }
            else if(isDecimal($num))
            {
                echo "The number {$num} is decimal.";
            }
            else 
            {
                echo "The number {$num} is roman.";
            }
        }
        else
        {
            echo "Enter a valid number.";
        }
    }
    else
    {
        echo "You must enter a number.";
    }
}

function convertNum($num)
{
    if(isBinary($num))
    {
        echo binaryToDecimal($num);
        echo "<br />";
        echo decimalToRoman(binaryToDecimal($num));
        echo "<br />";
    }
    else if(isDecimal($num))
    {
        echo decimalToRoman($num);
        echo "<br />";
        echo decimalToBinary($num);
        echo "<br />";
    }
    else 
    {
        echo romanToDecimal($num);
        echo "<br />";
        echo decimalToBinary(romanToDecimal($num));
        echo "<br />";
    }
}

$nums = [
    "1000011", 
    "MMMDCXV",
    "4325",
    "+562",
    "011001",
    "CCVXIII",
    "-239",
    "+10",
    "101011",
    "MCDXXI",
];

for($i = 0; $i < count($nums); $i++) {
    convertNum($nums[$i]); 
}