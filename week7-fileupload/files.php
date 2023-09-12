<?php
  session_start();

  require('functions.php');

  $user = $_SESSION['user'];
  if (!$user) {
    header('Location: /index.php');
  }

  $files = getFiles();

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
    <h1> Bienvenido
      <?php echo $user['name']; echo $user['lastname'] ?>
    </h1>
    <img src="<?php echo $user['imageurl']; ?>" alt="User profile picture" />
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
  <h1>Files</h1>
  <div class="container">
    <div class="row">
      <div class="col">
        <form action="/addfiles.php" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">

          <input type="hidden" class="form-control" id="" name="userId" value="<?php $user["id"]; ?>">

          <div class="form-group">
            <label class="sr-only" for="">Select File</label>
            <input type="file" class="form-control" name="selectedFile">
          </div>
          <input type="submit" class="btn btn-primary" text="Upload"></input>
        </form>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <table class="table">
          <thead>
            <tr>
              <th>File Name</th>
            </tr>
          </thead>
          <tbody>
            <?php
                foreach($files as $file) {
                  echo "<tr> <td scope=\"row\"> <a href=\"".$file['filepath']."\">".$file['filepath']."</a> </td> </tr>";
                }
            ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>

</body>

</html>