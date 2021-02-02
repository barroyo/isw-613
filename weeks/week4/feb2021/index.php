<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign up</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<?php
  $firstName = $_REQUEST['first-name'];
  $lastName = $_REQUEST['last-name'];
  $email = $_REQUEST['email'];

?>


<h1>User Signup</h1>
  <div class="container-fluid">
    <form method="post" action="">
        <div class="form-group">
          <label for="first-name">First Name</label>
          <input id="first-name" class="form-control" type="text" name="first-name">
        </div>
        <div class="form-group">
          <label for="last-name">Last Name</label>
          <input id="last-name" class="form-control" type="text" name="last-name">
        </div>
        <div class="form-group">
          <label for="email">Email Address</label>
          <input id="email" class="form-control" type="email" name="email">
        </div>
        <button class="btn btn-primary" type="submit">Sign up</button>
    </form>
  </div>
</body>
</html>
