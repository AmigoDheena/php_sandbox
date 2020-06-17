<?php
class Person{

    const CHAR_NAME = "Spider Man";
    public static $power = "Web";
    
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

    const COMPANY_NAME = 'Marvel';
    public static $SuitColor = "Red & Blue"; 

    /**
     * Title of job
     * @var string jobTitle
     */
    private $jobTitle;

    private static function SuitColor(){
        return self::$SuitColor;
    }

    public function __construct($jobTitle,$firstname,$lastname,$gender = 'Male')
    {
        $this->jobTitle = $jobTitle;
        echo self::SuitColor() . "<br>";
        echo self:: $power . "<br>";
        echo self::COMPANY_NAME ."<br>";
        echo parent::CHAR_NAME ."<br>"; //Get parrent const
        parent::__construct($firstname,$lastname,$gender);
    }

    public function __set($name,$value) //Comment and check
    {
        $this->$name = $value;
    }

    // public function getjobTitle()
    // {
    //     return $this->jobTitle;
    // }

    // another method
    public function __get($name)
    {
        return $this->$name;
    }

    public function empdetail(){
        return $this->firstname ." " .$this->lastname . " is a " . $this->jobTitle ." and good " . $this->gender . " employee <br>";
    }

}
echo Employee::$SuitColor . "<br>"; //we can call static variable without initiating an object
// echo Employee::SuitColor() . "<br>"; // only works for Public method
$peter = new Employee('PHP Developer','Peter','Parker');
$peter->jobTitle = "Tester"; //Without __set method we can't change the Private property value
echo $peter->empdetail();
// echo $peter->getjobTitle();
echo $peter->jobTitle."<br>";;
echo $peter::CHAR_NAME;