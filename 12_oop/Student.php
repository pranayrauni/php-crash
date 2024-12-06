<?php

require_once "Person.php";


class Student extends Person{
    public string $studentId;   

    public function __construct($name, $surname, $studentId)
    {
        parent::__construct($name, $surname);   // this parent constructor name and surname
        $this->age = 18;        // person class m age private rahne pe chal jayga kyuki ye student class khud ka property bna liya hai
        $this->studentId = $studentId;
        
    }
}