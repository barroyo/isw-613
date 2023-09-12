<?php
require('IDao.php');
require_once('DbConnection.php');

class StudentDao implements IDao {
  /**
   * Get the students from the database limited by a number
   */
  static function getAll($limit = 100) {
    $mysqlConnection = new DbConnection('127.0.0.1', 'root', 'root1234','php_web2');
    $students = $mysqlConnection->getMySQLConnection()->query("SELECT * from students LIMIT $limit");
    return $students->fetch_assoc();
  }

  /**
   * Save the current student into the database
   */
  static function save($data){

  }

  static function get($id){

  }

  static function update($data){

  }

  static function delete($id){

  }

}