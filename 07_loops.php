<?php

$counter = 0;
// while

while ($counter < 10) {
    echo $counter.'<br>';
    $counter++;
}

// Loop with $counter

// do - while

// for

for ($i=0; $i < 10; $i++) { 
    # code...
    echo $i.'<br>';
}
// foreach

$fruits = ["apple", "banana", "orange"];

foreach($fruits as $fruit){
    echo $fruit.' '.'<br>';
}


foreach ($fruits as $i => $fruit) {
    # code...
    echo $i.' '.$fruit.'<br>';

}



// Iterate Over associative array.


$person = [
    'name' => 'Brad',
    'surname' => 'Traversy',
    'age' => 30,
    'hobbies' => ['tennis', 'game']
];

foreach ($person as $key => $value) {
    if (is_array($value)) {
        echo $key.' '.implode(",", $value).'<br>';
    } else {
        echo $key.' '.$value.'<br>';
    }
    
}





