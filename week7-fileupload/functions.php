<?php

/**
 *  Gets a new mysql connection
 */
function getConnection() {
  $connection = new mysqli('localhost:3306', 'root', 'root1234', 'php_web2');
  if ($connection->connect_errno) {
    printf("Connect failed: %s\n", $connection->connect_error);
    die;
  }
  return $connection;
}

/**
 * Inserts a new student to the database
 *
 * @student An associative array with the student information
 */
function saveStudent($student) {
  $conn = getConnection();
  $sql = "INSERT INTO students( `full_name`, `email`, `document`)
          VALUES ('{$student['full_name']}', '{$student['email']}', '')";
  $conn->query($sql);

  if ($conn->connect_errno) {
    $conn->close();
    return false;
  }
  $conn->close();
  return true;
}

/**
 * Inserts a new user to the database
 *
 * @user An associative array with the student information
 */
function saveUser($user, $imagepath) {
  $conn = getConnection();
  $sql = "INSERT INTO users( `username`, `password`, `name`, `lastname`, `imageurl`)
          VALUES ('{$user['username']}', '{$user['password']}', '{$user['firstname']}','{$user['lastname']}', '$imagepath')";

  $conn->query($sql);


  if ($conn->connect_errno) {
    $conn->close();
    return false;
  }
  $conn->close();
  return true;
}

/**
 * Inserts a new file to the database
 *
 * @user An associative array with the student information
 */
function saveFile($filePath) {
  $conn = getConnection();
  $sql = "INSERT INTO files( `filepath`) VALUES ('$filePath')";

  $conn->query($sql);


  if ($conn->connect_errno) {
    $conn->close();
    return false;
  }
  $conn->close();
  return true;
}


/**
 * Get all students from the database
 *
 */
function getStudents(){
  $conn = getConnection();
  $sql = "SELECT * FROM students";
  $result = $conn->query($sql);

  if ($conn->connect_errno) {
    $conn->close();
    return [];
  }
  $conn->close();
  return $result;
}

/**
 * Get all files
 */
function getFiles(){
  $conn = getConnection();
  $sql = "SELECT * FROM files";
  $result = $conn->query($sql);

  if ($conn->connect_errno) {
    $conn->close();
    return [];
  }
  $conn->close();
  return $result;
}

/**
 * Get one specific student from the database
 *
 * @id Id of the student
 */
function authenticate($username, $password){
  $conn = getConnection();
  $sql = "SELECT * FROM users WHERE `username` = '$username' AND `password` = '$password'";
  $result = $conn->query($sql);

  if ($conn->connect_errno) {
    $conn->close();
    return false;
  }
  $conn->close();
  return $result->fetch_array();
}

/**
 * Deletes an student from the database
 */
function deleteStudent($id){
  $conn = getConnection();
  $sql = "DELETE FROM students WHERE id = $id";
  $result = $conn->query($sql);

  if ($conn->connect_errno) {
    $conn->close();
    return false;
  }
  $conn->close();
  return true;
}