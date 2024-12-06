<?php

// Declaring numbers

$a = 5;
$b = 4;
$c = 2.4;


// Arithmetic operations

echo $a + $b * $c;

echo "<br>";

echo $a - $b * $c;

echo "<br>";

echo $a / $b * $c;

echo "<br>";

echo $a % $b * $c;

echo "<br>";



// Assignment with math operators

// Increment operator

// Decrement operator

// Number checking functions

is_float(1.25);   // true
is_double(1.25);   // true
is_int(3);
is_numeric("4.5");   //true
is_numeric("5g");    // false


// Conversion

$strNumber = "2.4";
$number = (float)$strNumber;        // jisme v convert wo likh do.. float int etc

// another method
$num = floatval($strNumber);      // floatval intval

var_dump($number)."<br>";

echo "<br>";


// Number functions

echo abs(-15)."<br>";

echo abs(-15)."<br>";
echo pow(5, 2)."<br>";
echo sqrt(4)."<br>";
echo max(3, 5)."<br>";
echo min(3, 5)."<br>";
echo round(15.5)."<br>";
echo floor(3.9)."<br>";
echo ceil(4.8)."<br>";




// Formatting numbers


$num1 = 124356653.4363463;
echo number_format($num1, 2, '.', ',');    // variable, decimal k baad, decimal separator, thousands eparator 



// https://www.php.net/manual/en/ref.math.php
