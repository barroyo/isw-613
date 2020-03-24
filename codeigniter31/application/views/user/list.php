<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

  <title>Document</title>
</head>
<body>
<div class="container">
  <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
              <li><a href="#">Link</a></li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Hi <?php echo $this->session->user->name ?></a>
              </li>
              <li>
              <a class="nav-link disabled" href="<?php echo site_url(['user','logout']); ?>" tabindex="-1" aria-disabled="true">Logout</a>
              </li>
            </ul>
          </div>

        </div>
  </nav>

  <div class="msg">

    </div>
    <h1>Users List (<?php echo $usersQty; ?>)</h1>
    <table>
      <tbody>
        <tr><th>Name</th><th>Username</th></tr>
    <?php foreach ($users as $user) {
        echo "<tr><td><a href=\"/user/view/{$user->id}\">{$user->name}</a></td><td>{$user->username}</td></tr>";
    }?>

      </tbody>
    </table>
</div>

</body>
</html>
