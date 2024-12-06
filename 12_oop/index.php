<?php

// What is class and instance
/* class is blueprint. it is like template. it is like a datatype out of which we can create variables of that datatype.
 Those variables ara called instances or sometimes objects.
 
 when we create class we define properties and functionalities of that class. Instances of 
 that class will have properties and functionalities.
*/

// Create Person class in Person.php

// class is on its own separate file.

require_once "Person.php";
require_once "Student.php";





// Create instance of Person

// withouit using constructor
// $p1 = new Person();          // instance of class created

// $p1->name = 'Brad';
// $p1->surname = 'Traversy';

echo '<pre>';
// var_dump($p1);
echo '</pre>';

// echo $p1->name.'<br>';

// $p2 = new Person();
// $p2->name = 'Pranay';
// $p2->surname = 'Singh';

// echo $p2->name.'<br>';

// using constructor
$p3 = new Person("mikku", "singh");      // ye constructor ko pass kiya jayga
$p3->setAge(28);

echo '<pre>';
var_dump($p3);
echo '</pre>';

echo $p3->getAge();


echo Person::$counter;
echo Person::getCounter();




//  student

$student = new Student("hi", "hello", "1234");   // student person se aaya hai aur person m constructor argument le rha hai to yaha v argument den padega


// Using setter and getter