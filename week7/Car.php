<?php
class Car {

  const WHEELS_NUMBER = 4;
  public $make;
  private $year;
  public $model;
  public $color;


  function __construct($make, $year, $model, $color) {
    $this->make = $make;
    $this->model = $model;
    $this->year = $year;
    $this->color = $color;
  }

  // function Car($make, $year, $model, $color) {
  //   $this->make = $make;
  //   $this->model = $model;
  //   $this->year = $year;
  //   $this->color = $color;
  // }

  function set_year($year) {
    $this->year = $year;
  }

  function get_year(){
    return $this->year;
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