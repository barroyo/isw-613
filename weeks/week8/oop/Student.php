<?php
require_once('Person.php');

class Student extends Person {
  private $carnet;

  function __construct($name, $lastName, $age, $carnet){
    parent::__construct($name, $lastName, $age );
    $this->carnet = $carnet;
  }

  public function toString() {
     echo "{$this->carnet},{$this->savings}";
  }

  public function getCarnet() {
    return $this->carnet;
  }

  public function setCarnet($carnet) {
    $this->carnet = $carnet;
  }
}


// echo "first answer \n";
// $p = new Student('Bladimir', 'Arroyo', 25, '200013274');
// // var_dump($p);
// echo $p->name;
// echo $p->getCarnet();


// echo "Accesing protected \n";
// $p = new Student('Bladimir', 'Arroyo', 25, '200013274');
// echo $p->toString(); //works



// echo "second - accessing protected:\n";
// $p = new Student('Bladimir', 'Arroyo', 25, '200013274');
// echo $p->toString(); //

// echo "third, private attribute :\n";
// $p = new Student('Bladimir', 'Arroyo', 25, '200013274');
// echo $p->internalId; //error

// echo "fourth: accesing static from instance\n";
// $p = new Person('Bladimir', 'Arroyo', 25);
// echo $p::$id; //error
// echo "fifth: accessing static from Class \n";
// echo Person::$id;

// echo "six : \n";
// echo $p->toString();

// echo "seventh: \n";
// echo Person::toString();
