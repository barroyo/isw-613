<?php
  session_start();

  $user = $_SESSION['user'];
  if (!$user) {
    header('Location: /index.php');
  }
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
  </head>
  <body>
  <header>
  <h1> Bienvenido <?php echo $user['name']; echo $user['lastname'] ?> </h1>
  <img src="<?php echo $user['imageurl']; ?>" alt="User profile picture"/>
  <a href="/logout.php">Logout</a>
  </header>

  <nav class="nav">
    <?php  if($user['role'] === 'Administrador') { ?>
      <li class="nav-item">
        <a class="nav-link active" href="#">Users</a>
      </li>
    <?php } ?>
    <li class="nav-item">
      <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Arboles</a>
    </li>
  </nav>

  </body>
  </html>
