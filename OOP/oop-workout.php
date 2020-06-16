<?php
class Person{
    
    public $firstname;
    public $lastname;
    public $gender;

    public function __construct($firstname,$lastname,$gender='Male')
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->gender = $gender;
    }
    public function sayHello(){
        return "Hi There I'm ". $this->firstname . " ". $this->lastname;
    }
}
$parker = new Person('Peter','Parker');
echo $parker->sayHello() . "<br>";
echo $parker->gender . "<br>";


class Employee extends Person{

    public $jobTitle;

    public function __construct($jobTitle,$firstname,$lastname,$gender = 'Male')
    {
        $this->jobTitle = $jobTitle;
        parent::__construct($firstname,$lastname,$gender);
    }
    public function empdetail(){
        return $this->firstname ." " .$this->lastname . " is a " . $this->jobTitle ." and good " . $this->gender . " employee";
    }

}

$peter = new Employee('PHP Developer','Peter','Parker');
echo $peter->empdetail();