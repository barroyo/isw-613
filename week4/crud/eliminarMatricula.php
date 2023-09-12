<?php

$id = $_REQUEST['id'];

if($id) {

  $sql = "DELETE FROM matricula WHERE `id` = $id";
  $conn = mysqli_connect('localhost:3306', 'root', 'root1234', 'php_web2');
  mysqli_query($conn, $sql);
}

header('location: matricula.php');