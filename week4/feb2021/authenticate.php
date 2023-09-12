<?php

// get parameters
$username = $_REQUEST['username'];
$pass = $_REQUEST['password'];

// query the database to authenticate
$sql = "SELECT from users where username = `$username` AND password = `$pass`";
$result = mysqli_query($connection, $sql);

// if valid
session_start();
$_SESSION['user'] = ['username'];
   // create a session
   // redirect to dashboard
header("Location: login.php");
// else
  // redirect to login

