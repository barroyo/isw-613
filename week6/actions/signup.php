<?php
require '../utils/functions.php';
$uploads_folder = $_SERVER["DOCUMENT_ROOT"]."/uploads/";

if($_POST && isset($_REQUEST['firstName'])) {
  //get each field and insert to the database
  $user['firstName'] = $_REQUEST['firstName'];
  $user['lastName'] = $_REQUEST['lastName'];
  $user['email'] = $_REQUEST['email'];
  $user['province_id'] = $_REQUEST['province'];
  $user['password'] = $_REQUEST['password'];


  $file_tmp = $_FILES["profilePic"]["tmp_name"];
  $file_name = basename($_FILES["profilePic"]["name"]);
  $target_file = $uploads_folder . $file_name;
  move_uploaded_file($file_tmp,$target_file);

  $user['profile_picture'] = $file_name;

  if (saveUser($user)) {
    header( "Location: /",);
  } else {
    header( "Location: /?error=Invalid user data");
  }
}