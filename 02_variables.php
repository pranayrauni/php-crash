<?php

// What is a variable
// variable stores value. it does not have types. phph is loosely typed language.
// no need to declare type of variable while declaring it. it is of dynamic type. its type changes on value assigned to it.

// Variable types

/* 
string
integer
float/double
boolean
null
array
object
resource
*/

// Declare variables

$name = "pranay";
$age = 25;
$isMale = true;
$height = 1.85;
$salary = null;
     

// Print the variables. Explain what is concatenation
// dot is used to concatente.

echo $name."<br>";
echo $age."<br>";
echo $isMale."<br>";    // when boolean is converted into string printing then true is 1 and false is empty string.
echo $height."<br>";
echo $salary."<br>";        // null also got converted into empty string. 

// Print types of the variables

echo gettype($name)."<br>";



// Print the whole variable

var_dump($name)."<br>";

echo "<br>";

var_dump($age)."<br>";

echo "<br>";

var_dump($name, $age, $isMale, $height, $salary)."<br>";


echo "<br>";


// Change the value of the variable

$name = false;

// Print type of the variable

echo gettype($name)."<br>";       // boolean

// Variable checking functions

echo is_string($name);     // false as type of variable has been changed

echo is_int($age);

is_bool($isMale);

is_double($height);

echo "<br>";

// Check if variable is defined

isset($name);   // true
isset($address);    // false

// Constants

define('PI', 3.14);

echo PI."<br>";

// Using PHP built-in constants

echo SORT_ASC."<br>";        // sort ascending... sort max constant

echo PHP_INT_MAX."<br>";     // max number integer can have
