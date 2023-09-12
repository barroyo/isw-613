<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
  <div class="container-fluid">
    <div class="jumbotron">
      <h1 class="display-4">Login</h1>
      <p class="lead">This is the login Screen</p>
      <hr class="my-4">
    </div>
    <form method="post" action="<?php echo site_url('user/authenticate');?>">
      <div class="form-group">
        <label for="username">Username/Email</label>
        <input id="username" class="form-control" type="text" name="username">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input id="password" class="form-control" type="password" name="password">
      </div>
      <button type="submit" class="btn btn-primary"> Login </button>
    </form>
  </div>
</body>
</html>