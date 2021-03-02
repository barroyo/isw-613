<?php
require_once('DbConnection.php');

class Students {

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
   * Get the students from the database
   */
  static function getStudents($limit = 100) {
    $mysqlConnection = new DbConnection('127.0.0.1', 'root', 'root1234','php_web2');
    $result = $mysqlConnection->getMySQLConnection()->query("SELECT * from students LIMIT $limit");
    $result->fetch_assoc();
  }

  /**
   * Save the current student into the database
   */
  function save(){

  }

  /**
   * Returns a CSV representation of the student
   */
  function toCsv(){
    return "{$this->fullName},{$this->cedula},{$this->age},{$this->id}";
  }

}