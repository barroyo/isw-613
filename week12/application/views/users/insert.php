<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add User</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <script type="text/javascript">
    function checkExistingEmail($email) {
      if ( $email.length > 5 ) { // ideally validate if its a valid email address with a regex
        const xhttp = new XMLHttpRequest(); //creates the XMLHttpRequest object
        xhttp.onreadystatechange = function() { //function called when request is completed
          // do whatever you want with the response received from the server
          if (this.readyState == 4 && this.status == 200) {
            const response = JSON.parse(this.responseText);
            if (response.status) {
              document.getElementById('username').removeAttribute('style');
            } else {
              document.getElementById('username').setAttribute('style', 'border: 2px solid red');
            }
          }
        };

        xhttp.open("POST", "/index.php/user/validateEmail/"+$email, true); //define where should the request be made to
        xhttp.send(); // execute the call
      }
    }
  </script>
</head>

<body>
  <div class="container-fluid">
    <div class="jumbotron">
      <h1 class="display-4">Add User</h1>
      <p class="lead">Add a new user</p>
      <hr class="my-4">
    </div>
    <form method="post" action="<?php echo site_url('user/insert');?>">
      <div class="form-group">
        <label for="username">Username/Email</label>
        <input id="username" class="form-control" type="text" name="username" onkeyup="checkExistingEmail(this.value)">
      </div>
      <div class="form-group">
        <label for="name">First Name</label>
        <input id="name" class="form-control" type="text" name="name">
      </div>
      <div class="form-group">
        <label for="lastname">Last Name</label>
        <input id="lastname" class="form-control" type="text" name="lastname">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input id="password" class="form-control" type="password" name="password">
      </div>
      <button type="submit" class="btn btn-primary"> Add </button>
    </form>
  </div>

</body>
</html>