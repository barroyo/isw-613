<?php
class Person {
  public $name = 'Name';
  public $lastName = 'Last Name';
  public $age = 25;
  private $internalId = 123;

  protected $savings = 122545;
  static $id = '123-4';

  function __construct($name, $lastName, $age){
    $this->name = $name;
    $this->lastName = $lastName;
    $this->age = $age;
  }

  public function setInternalId($id) {
    $this->internalId = $id;
  }

  public function getInternalid() {
    return $this->internalId;
  }

  public function toString() {
     echo $this->name;
     echo $this->savings;
     echo $this->internalId;
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
