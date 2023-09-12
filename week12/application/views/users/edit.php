<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit User</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
  <div class="container-fluid">
    <div class="jumbotron">
      <h1 class="display-4">Edit User</h1>
      <p class="lead">Edit existing user</p>
      <hr class="my-4">
    </div>
    <form method="post" action="<?php echo site_url('user/save');?>">
      <div class="form-group">
        <label for="username">Username/Email</label>
        <input id="username" class="form-control" type="text" name="username" value="<?php echo $user->username ?>">
      </div>
      <div class="form-group">
        <label for="name">First Name</label>
        <input id="name" class="form-control" type="text" name="name" value="<?php echo $user->name ?>">
      </div>
      <div class="form-group">
        <label for="lastname">Last Name</label>
        <input id="lastname" class="form-control" type="text" name="lastname" value="<?php echo $user->lastname ?>">
      </div>

      <button type="submit" class="btn btn-primary"> Save </button>
    </form>
  </div>
</body>
</html>