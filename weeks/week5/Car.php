<?php
class Car {

  const WHEELS_NUMBER = 4;
  public $make;
  public $year;
  public $model;
  public $color;


  function __construct($make, $year, $model, $color) {
    $this->make = $make;
    $this->model = $model;
    $this->year = $year;
    $this->color = $color;
  }


  function Car($make, $year, $model, $color) {
    $this->make = $make;
    $this->model = $model;
    $this->year = $year;
    $this->color = $color;
  }


  function to_string() {
     return "{$this->make} - {$this->model} - {$this->year} - {$this->color} ". PHP_EOL;
  }

  /**
   * Returns a CVS representation of this object
   */
  function to_csv() {
     return "{$this->make},{$this->model},{$this->year},{$this->color}". PHP_EOL;
  }

  function get_number_of_wheels() {
    return self::WHEELS_NUMBER;
  }

}