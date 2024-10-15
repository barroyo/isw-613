<?php


/**
 *  Gets the provinces from the database
 */
function getProvinces(): array {
  //select * from provinces
  return [1 => 'Alajuela', 2 => 'San Jose', 3 => 'Cartago', 80 => 'Heredia', 90 => 'Limon', 100 => 'Puntarenas', 200 => 'Guanacaste'];
}

function getConnection(): bool|mysqli {
  $connection = mysqli_connect('localhost:3306', 'root', 'root1234', 'php_web2');
  return $connection;
}

/**
 * Saves an specific user into the database
 */
function saveUser($user): bool{

  $firstName = $user['firstName'];
  $lastName = $user['lastName'];
  $username = $user['email'];
  $profilePic = $user['profile_picture'];
  $password = md5($user['password']);

  $sql = "INSERT INTO users (name, lastname, username, password, profile_picture)
          VALUES('$firstName', '$lastName', '$username','$password','$profilePic')";

  try {
    $conn = getConnection();
    mysqli_query($conn, $sql);
  } catch (Exception $e) {
    echo $e->getMessage();
    return false;
  }
  return true;
}

/**
 * Get one specific student from the database
 *
 * @id Id of the student
 */
function authenticate($username, $password): bool|array|null{
  $conn = getConnection();
  $password = md5($password);
  $sql = "SELECT * FROM users WHERE `username` = '$username' AND `password` = '$password'";
  $result = $conn->query($sql);

  if ($conn->connect_errno) {
    $conn->close();
    return false;
  }
  $results = $result->fetch_array();
  $conn->close();
  return $results;
}

/**
 * Inserts a new file to the database
 *
 * @user An associative array with the student information
 */
function saveProfilePic($filePath) {
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