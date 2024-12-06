<?php


class Person{

    // since php7.4 it is possible to to write type of properties.
    public string $name;
    public string $surname;
    // private ?int $age;
    // agar age ko private se protected kar de to student class jo ki derive hua hai person se usme dikhne lagega
    protected ?int $age;

    // static properties and static method belong to class itself not instance.
    public static int $counter = 0;


    public function __construct($name, $surname)
    {
        // echo $name." ".$surname;
        // instaed of printing we can save this properties using this keyword
        // this keyword indicates to instance on which that constructor is called.
        $this->name = $name;
        $this->surname = $surname;
        $this->age = null;     // whie creating instance if you want age to be null then add question mark before type of age.


        // to access static, use self keyword
        self::$counter++;
    }


    // following is method that is function associated to that class.
    public function setAge($age) 
    {
        $this->age = $age;

    }
    // when we have private property we create setter to set value for that private property and getter to get value.

    public function getAge()
    {
        return $this->age;
    }


    public static function getCounter(){
        return self::$counter;
    }

}