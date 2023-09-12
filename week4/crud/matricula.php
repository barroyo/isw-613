<?php
require('functions.php');

$matriculas = getMatriculas();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listado de Matriculas</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <div class="container-fluid">
    <div class="jumbotron">
      <h1 class="display-4">Matricula</h1>
      <p class="lead">Proceso de matricula</p>
      <hr class="my-4">
    </div>

    <a href="/index.php">Nuevo</a>
    <table class="table table-light">
      <tr>
        <th>Name</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Carrera</th>
        <th>Actions</th>
      </tr>
      <tbody>
        <?php
          // loop matriculas
          foreach($matriculas as $matricula) {
            echo "<tr><td>".$matricula['firstName']."</td><td>".$matricula['lastName']."</td><td>".$matricula['email']."</td><td><a href=\"verCarrera.php?id=".$matricula['careerId']."\">".$matricula['careerName']."</a></td><td><a href=\"editarMatricula.php?id=".$matricula['id']."\">Edit</a> | <a href=\"eliminarMatricula.php?id=".$matricula['id']."\">Delete</a></td></tr>";
          }
        ?>
      </tbody>
    </table>
  </div>

</body>

</html>
