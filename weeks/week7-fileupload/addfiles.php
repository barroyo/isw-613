<?php
  require('functions.php');

  if($_POST) {
    // upload image
    $file_tmp = $_FILES["selectedFile"]["tmp_name"];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["selectedFile"]["name"]);
    move_uploaded_file($file_tmp,$target_file);

    // save to DB
    $file = saveFile($target_file);

    if($file){
      header('Location: /files.php');
    }
  }




