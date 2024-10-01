<?php
$name = @$_REQUEST["name"];
$lastname = @$_REQUEST["lastname"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Print Name</title>
</head>

<body>
  <form action="/utils/print.php" method="POST">
    <div class="form-group">
      <label for="name">Nombre</label>
      <input type="text" class="form-control" name="name" value="<?php echo $name ?>" id="" placeholder="Your name">
      <label for="lastname">Last Name</label>
      <input type="text" class="form-control" name="lastname" value="<?php echo $lastname ?>" id=""
        placeholder="Your last name">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</body>

</html>