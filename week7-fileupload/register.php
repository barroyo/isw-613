<?php
  session_start();
  if ($_SESSION && $_SESSION['user']){
    //user already logged in
    header('Location: /dashboard.php');
  }

  $message = "";
  if(!empty($_REQUEST['status'])) {
    switch($_REQUEST['status']) {
      case 'login':
        $message = 'User does not exists';
      break;
      case 'error':
        $message = 'There was a problem inserting the user';
      break;
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

  <title>Add user</title>
</head>
<body>
<div class="container">
    <div class="msg">
      <?php echo $message; ?>
    </div>
    <h1>User Login</h1>
    <form action="/adduser.php" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
      <div class="form-group">
        <label class="sr-only" for="">First Name</label>
        <input type="text" class="form-control" id="" name="firstname" placeholder="Your name">
      </div>
      <div class="form-group">
        <label class="sr-only" for="">Last Name</label>
        <input type="text" class="form-control" id="" name="lastname" placeholder="Your last name">
      </div>
      <div class="form-group">
        <label class="sr-only" for="">Username</label>
        <input type="text" class="form-control" id="" name="username" placeholder="Your username">
      </div>
      <div class="form-group">
        <label class="sr-only" for="">Password</label>
        <input type="password" class="form-control" id="" name="password" placeholder="Your password">
      </div>
      <div class="form-group">
        <label class="sr-only" for="">Profile Picture</label>
        <input type="file" class="form-control" name="profilePic" id="profilePic">
      </div>
      <input type="submit" class="btn btn-primary" text="Save"></input>
    </form>
</div>

</body>
</html>

