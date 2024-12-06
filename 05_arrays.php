<?php

// Create array

$fruits = ["banana", "apple", "orange"];     

// Print the whole array

var_dump($fruits);
echo "<br>";

// thoda acha se dikhanan hai to pre use karo
echo '<pre>';
var_dump($fruits);
echo '</pre>';


// Get element by index


echo $fruits[1].'<br>';


// Set element by index

$fruits[0] = 'peach';

echo '<pre>';
var_dump($fruits);
echo '</pre>';

echo "<br>";


// Check if array has element at index 2

isset($fruits[2]);    // boolean


// Append element

$fruits[] = "papaya";

echo '<pre>';
var_dump($fruits);
echo '</pre>';

echo "<br>";

// Print the length of the array

echo count($fruits).'<br>';


// Add element at the end of the array

$fruits[] = "pineapple";

echo '<pre>';
var_dump($fruits);
echo '</pre>';

echo "<br>";

// Remove element from the end of the array

echo array_pop($fruits);

echo '<pre>';
var_dump($fruits);
echo '</pre>';

echo "<br>";

// Add element at the beginning of the array

echo array_unshift($fruits, 'bar');

echo '<pre>';
var_dump($fruits);
echo '</pre>';

echo "<br>";

// Remove element from the beginning of the array

array_shift($fruits);

// Split the string into an array

 $string = "hello,hi,bye";

echo '<pre>';
var_dump(explode(",", $string));
echo '</pre>';

echo "<br>";


// Combine array elements into string


echo implode(",", $fruits).'<br>';


// Check if element exist in the array

in_array('mango', $fruits);     // returns boolean

// Search element index in the array

array_search('apple', $fruits);  // returns index

// Merge two arrays

$vegetables = ['potato', 'tomato'];

$both = array_merge($fruits, $vegetables);

echo '<pre>';
var_dump($both);
echo '</pre>';

echo "<br>";

// another method
echo '<pre>';
var_dump([...$fruits, ...$vegetables]);
echo '</pre>';

echo "<br>";

// Sorting of array (Reverse order also)

sort($fruits);        // use rsort to sort in reverse order

echo '<pre>';
var_dump($fruits);
echo '</pre>';

echo "<br>";
// https://www.php.net/manual/en/ref.array.php

// ============================================
// Associative arrays  - key value pairs
// ============================================

// Create an associative array

$person = [
    'name' => 'Brad',
    'surname' => 'Traversy',
    'age' => 30,
    'hobbies' => ['tennis', 'game']
];

echo '<pre>';
var_dump($person);     // print_r is also used instaed of var_dump
echo '</pre>';

echo "<br>";


// Get element by key

echo $person['name'].'<br>';


// Set element by key

$person['channel'] = 'media';

echo '<pre>';
var_dump($person);
echo '</pre>';

echo "<br>";


// Null coalescing assignment operator. Since PHP 7.4

// if(!isset($person['address'])){
//     $person['address'] = 'unknown';
// }

$person['address'] ??= 'unknown';

echo '<pre>';
var_dump($person);
echo '</pre>';

echo "<br>";

// Check if array has specific key

// use isset 
 

// Print the keys of the array

echo '<pre>';
var_dump(array_keys($person));
echo '</pre>';

echo "<br>";


// Print the values of the array

echo '<pre>';
var_dump(array_values($person));
echo '</pre>';

echo "<br>";

// Sorting associative arrays by values, by keys

ksort($person);        //  to sort by value use asort.

echo '<pre>';
var_dump($person);
echo '</pre>';

echo "<br>";


// Two dimensional arrays


$todo = [
    ['title' => 'todo title 1', 'completed' => true],
    ['title' => 'todo title 2', 'completed' => false]
];

echo '<pre>';
var_dump($todo);
echo '</pre>';

echo "<br>";