<?php

// Function which prints "Hello I am Zura"

function hello(){
    echo "hi".'<br>';
}

hello();

// Function with argument


function hey($name){
    echo "hi, $name".'<br>';

    return "hi";
}

echo hey('pranay').'<br>';


// Create sum of two functions

// Create function to sum all numbers using ...$nums

function sum(...$nums){
    $sum = 0;
    foreach($nums as $num){
        $sum  += $num;

    }
    return $sum;
}

echo sum(1, 2, 3, 4).'<br>';

// Arrow functions


function sum1(...$nums){
    
    return array_reduce($nums, fn($carry, $num) => $carry + $num);
}

echo sum1(1, 2, 3, 4).'<br>';


