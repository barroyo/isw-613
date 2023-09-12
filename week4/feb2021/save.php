<?php
require('functions.php');


if($_POST['firstName']) {

  //get each field and insert to the database
  $user['firstName'] = $_POST['firstName'];
  $user['lastName'] = $_POST['lastName'];
  $user['email'] = $_POST['email'];
  $user['phone'] = $_POST['phone'];
  saveUser($user);

}