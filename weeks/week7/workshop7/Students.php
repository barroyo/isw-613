<?php

class Student {

  public $id;
  public $fullName;
  public $cedula;
  public $age;

  function __constructor($fullName, $cedula, $age, $id = 0 ){
    $this->fullName = $fullName;
    $this->cedula = $cedula;
    $this->age = $age;
    $this->id = $id;
  }


  /**
   * Returns a CSV representation of the student
   */
  function toCsv(){
    return "{$this->fullName},{$this->cedula},{$this->age},{$this->id}";
  }

}