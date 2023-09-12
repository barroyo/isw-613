<?php
session_start();

$username = $_REQUEST['user_name'];
$password = $_REQUEST['password'];
$rememberme = $_REQUEST['rememberme'];

if($rememberme == 1) {
  setcookie("username", $username, time()+60*60*24*30, '/', 'localhost');
  //echo $_COOKIE["username"];
  // // delete
  // unset($_COOKIE["username"]);
  // setcookie("username","",time()-1);
}

if ($username === 'barroyo' && $password === '122') {
  $_SESSION['firstname'] = 'Bladimir';
  $_SESSION['user_id'] = 1;
  $_SESSION['avatar'] = 'https://sguru.org/wp-content/uploads/2017/06/cool-anonymous-profile-pictures-1699946_orig.jpg';
  echo json_encode($_SESSION);
} else {
  echo json_encode(['error'=> 'invalid user information']);
}
// header('Location: /index.php');


?>
