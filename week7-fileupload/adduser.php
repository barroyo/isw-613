<?php
  require('functions.php');

  if($_POST) {
    // upload image
    $file_tmp = $_FILES["profilePic"]["tmp_name"];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["profilePic"]["name"]);
    move_uploaded_file($file_tmp,$target_file);

    // save to DB
    $user = saveUser($_REQUEST, $target_file);

    if($user){
      header('Location: /index.php');
    }
  }




