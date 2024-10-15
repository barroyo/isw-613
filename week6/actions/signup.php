<?php
require '../utils/functions.php';

if($_POST && isset($_REQUEST['firstName'])) {
  //get each field and insert to the database
  $user['firstName'] = $_REQUEST['firstName'];
  $user['lastName'] = $_REQUEST['lastName'];
  $user['email'] = $_REQUEST['email'];
  $user['province_id'] = $_REQUEST['province'];
  $user['password'] = $_REQUEST['password'];


  $file_tmp = $_FILES["profilePic"]["tmp_name"];
  $target_dir = dir(__FILE__). "../uploads/";
  $target_file = $target_dir . basename($_FILES["profilePic"]["name"]);
  move_uploaded_file($file_tmp,$target_file);

  $user['profile_picture'] = $target_file;

  if (saveUser($user)) {
    header( "Location: /",);
  } else {
    header( "Location: /?error=Invalid user data");
  }
}