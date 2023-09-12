<?php

function getConnection() {
  $connection = mysqli_connect('localhost:3306', 'root', 'root1234', 'php_web2');
  return $connection;
}

/**
 * Saves an specific user into the database
 */
function saveUser($user){

  $firstName = $user['firstName'];
  $lastName = $user['lastName'];

  $sql = "INSERT INTO users VALUES('$firstName', '$lastName')";

  echo $sql;
  $conn = getConnection() ;
  mysqli_query($conn, $sql);


}

/**
 *  Gets the provinces from the database
 */
function getProvinces() {
  //select * from provinces
  return [55 => 'Alajuela', 56 => 'San Jose', 57 => 'Cartago', 80 => 'Heredia', 90 => 'Limon', 100 => 'Puntarenas', 200 => 'Guanacaste'];
}