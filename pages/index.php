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
    <h1><?php echo $form_type; ?> form</h1>

    <form action="/actions/login.php" method="post">
      <input type="text" name="user_name" class="text-input" value="<?= $username ?>"/>
      <input type="password" name="password" class="text-input"/>
      <input type="fieldx" name="fieldx" class="text-input"/>
      <input type="submit" value="Login">
      <input type="checkbox" name="rememberme" value="1" />
    </form>
  </section>
</body>
</html>