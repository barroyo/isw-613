<?php
  session_start();


  $user = $_SESSION['user'];
  if (!$user) {
    header('Location: /index.php');
  }
  ?>

  <h1> Bienvenido <?php echo $user['name'] ?> </h1>
  <a href="/logout.php">Logout</a>





