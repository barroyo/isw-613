<?php 
class Person {
  public $name = 'Name';
  public $lastName = 'Last Name';
  public $age = 25;
  protected $savings = 122545;
  static $id = '123-4';
  private $internalId = 123;
  
  public function toString() {
     echo $this->name;
     echo $this->savings;
     echo $this->internalId;
  }
}


echo "first answer \n";
$p = new Person(); 
echo $p->lastName; 

echo "second:\n";
echo $p->savings;

echo "third:\n";
echo $p->internalId;

echo "fourth:\n";
echo $p::$id;

echo "fifth: \n";
echo Person::$id;

echo "six : \n";
echo $p->toString();

echo "seventh: \n";
echo Person::toString();
