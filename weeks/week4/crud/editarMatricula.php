<?php

require('functions.php');


$carreras = getCarreras();
$matricula = getMatriculaById($_REQUEST['id']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Matricula</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <div class="container-fluid">
    <div class="jumbotron">
      <h1 class="display-4">Matricula</h1>
      <p class="lead">Editar matricula</p>
      <hr class="my-4">
    </div>
    <form method="post" action="matricular.php">
      <input type="hidden" value="<?php echo $matricula['id']; ?>" name="id"/>
      <div class="form-group">
        <label for="first-name">First Name</label>
        <input id="first-name" class="form-control" type="text" name="firstName" value="<?php echo $matricula['firstName'] ?>">
      </div>
      <div class="form-group">
        <label for="last-name">Last Name</label>
        <input id="last-name" class="form-control" type="text" name="lastName" value="<?php echo $matricula['lastName'] ?>">
      </div>
      <div class="form-group">
        <label for="email">Email Address</label>
        <input id="email" class="form-control" type="text" name="email" value="<?php echo $matricula['email'] ?>">
      </div>
      <div class="form-group">
        <label for="carrera">Carrera</label>
        <select id="carrera" class="form-control" name="career">
          <?php

          foreach($carreras as $carrera) {
            if($matricula['careerId'] == $carrera['id']) {
              echo "<option selected value=\"".$carrera['id']."\">".$carrera['name']."</option>";
            } else {
              echo "<option value=\"".$carrera['id']."\">".$carrera['name']."</option>";
            }
          }
          ?>
        </select>
      </div>

      <button type="submit" class="btn btn-primary"> Guardar </button>

    </form>
  </div>

</body>

</html>
