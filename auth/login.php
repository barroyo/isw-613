<?php
  require('functions.php');

  session_start();

  if($_POST) {
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];


    $user = authenticate($username, $password);
    if($user) {
      $_SESSION['user'] = $user;
      header('Location: /dashboard.php');
    } else {
      header('Location: /index.php?status=login');
    }
  }




