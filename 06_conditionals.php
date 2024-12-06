<?php

$age = 20;
$salary = 300000;

// Sample if

if ($age === 20) {
    echo "1";
}

echo "<br>";

// Without circle braces

// Sample if-else
if ($age>20) {
    echo "1";
} else {
    echo "2";
}

// Difference between == and ===
    //    === checks type as well

// if AND

if ($age == 20 && $salary == 300000) {
    # code...
} else {
    # code...
}



// if OR

// Ternary if

$age < 22 ? 'young' : 'old';

// Short ternary

$age ?: 18;        // agar age hai to wo nhi to 18

// Null coalescing operator

$myName = isset($name) ? $name : 'john';
// both same
$myName = $name ?? 'john';

// switch

$userRole = 'admin';
switch($userRole) {
    case 'admin':
        echo 'admin';
        break;
    case 'editor':
        echo 'editor';
        break;
    default:
        echo 'Inavlid';
}



