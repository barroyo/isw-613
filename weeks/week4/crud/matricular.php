<?php

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$careerId = $_POST['career'];

// significa que se esta haciendo update
if($_POST['id']) {
  $sql = "UPDATE matricula SET `firstName` = '$firstName', `lastName` = '$lastName', `email` = '$email', `careerId` = $careerId
          WHERE `id` = {$_POST['id']} ";

} else {
  $sql = "INSERT INTO matricula (`firstName`, `lastName`, `email`, `careerId`)
          VALUES('$firstName', '$lastName', '$email', $careerId)";

}
$conn = mysqli_connect('localhost:3306', 'root', 'root1234', 'php_web2');
mysqli_query($conn, $sql);

header('location: matricula.php');