<?php
  if($_GET) {
    $name = $_REQUEST['name'];
    $lastname = $_REQUEST['lastname'];
    $username = $_REQUEST['username'];

    $sql = "INSERT INTO users(`username`, `name`, `lastname`) VALUES ('$username','$name', '$lastname')";

    $connection = mysqli_connect('localhost:3306', 'root', 'root1234', 'php_web2');
    mysqli_query($connection, $sql);
    mysqli_close($connection);
    // header('Location: /page/?status=success');
  } else {
    // header('Location: /page/?status=error');
  }




