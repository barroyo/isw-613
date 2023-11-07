<?php
require_once('Person.php');

class Student extends Person {
  private $carnet;

  function __construct($name, $lastName, $age, $carnet){
    parent::__construct($name, $lastName, $age );
    $this->carnet = $carnet;
  }

  public function toString() {
     echo $this->carnet;
  }
}


// echo "first answer \n";
// $p = new Person();
// echo $p->lastName;

// echo "second:\n";
// echo $p->savings; //error

// echo "third:\n";
// echo $p->internalId; //error

// echo "fourth:\n";
// echo $p::$id; //error

// echo "fifth: \n";
// echo Person::$id;

// echo "six : \n";
// echo $p->toString();

// echo "seventh: \n";
// echo Person::toString();
