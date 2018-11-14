<?php

  session_start();
  $form_type = isset($_GET['formName']) ? $_GET['formName'] : 'Login';
  $firstname = isset($_SESSION['firstname'])? $_SESSION['firstname'] : null ;
  $avatar = isset($_SESSION['avatar'])? $_SESSION['avatar'] : null;
  $username = isset($_COOKIE["username"])? $_COOKIE["username"] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>My <?php echo $form_type?> Form</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
  <header>
    <?php if (isset($firstname) ) { ?>
      Hi <span><?php echo $firstname ?> </span>
      <img width="40" src="<?php echo $avatar ?>" alt="" />
      <a href="/actions/logout.php">Logout</a>
    <?php } ?>
  </header>
  <section>
    <h1 id="welcome-message"><?php echo $form_type; ?> form ajax</h1>

    <form action="index.php" method="post">
      <input type="text" name="user_name" id="username" class="text-input" value="<?= $username ?>"/>
      <input type="password" name="password" id="password" class="text-input"/>
      <input type="button" value="Login" id="submit-button">
      <input type="checkbox" name="rememberme" value="1" />
    </form>
  </section>
  <script src="application.js"></script>
</body>
</html>