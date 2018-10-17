<?php
$username = $_REQUEST['user_name'];
$password = $_REQUEST['password'];

// query a DB
if ($username === 'barroyo' && $password === '122') {
  session_start();
  $_SESSION['firstname'] = 'Bladimir';
  $_SESSION['user_id'] = 1;
  $_SESSION['avatar'] = 'https://sguru.org/wp-content/uploads/2017/06/cool-anonymous-profile-pictures-1699946_orig.jpg';
} else {
  echo "invalid user";
}
header('Location:/index.php');


//insert
?>
