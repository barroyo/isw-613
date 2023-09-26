<?php

/**
 *  Gets the provinces from the database
 */
function getProvinces() {
  //select * from provinces
  return [1 => 'Alajuela', 2 => 'San Jose', 3 => 'Cartago', 80 => 'Heredia', 90 => 'Limon', 100 => 'Puntarenas', 200 => 'Guanacaste'];
}

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
  $username = $user['email'];

  $sql = "INSERT INTO users (name, lastname, username) VALUES('$firstName', '$lastName', '$username')";

  $conn = getConnection() ;
  mysqli_query($conn, $sql);
  return true;
}