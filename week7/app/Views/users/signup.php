<div class="container-fluid">
  <div class="jumbotron">
    <h1 class="display-4">Signup</h1>
    <p class="lead">This is the signup process</p>
    <hr class="my-4">
  </div>
  <form method="post" action="<?php echo site_url('user/register') ?>" enctype="multipart/form-data">
    <div class="error">
      <?php echo $error_msg; ?>
    </div>
    <div class="form-group">
      <label for="first-name">First Name</label>
      <input id="first-name" class="form-control" type="text" name="firstName">
    </div>
    <div class="form-group">
      <label for="last-name">Last Name</label>
      <input id="last-name" class="form-control" type="text" name="lastName">
    </div>
    <div class="form-group">
      <label for="province">Provincia</label>
      <select id="province" class="form-control" name="province">
        <?php
        foreach ($provinces as $province) {
          echo "<option value=\"{$province['id']}\">{$province['name']}</option>";
        }
        ?>
      </select>
    </div>
    <div class="form-group">
      <label for="email">Email Address</label>
      <input id="email" class="form-control" type="text" name="email">
      <span id="error_email" class="error"></span>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input id="password" class="form-control" type="password" name="password">
    </div>
    <div class="form-group">
      <label for="profilePic">Profile Picture</label>
      <input type="file" class="form-control" name="profilePic" id="profilePic" accept="image/png, image/jpeg" multiple="true">
    </div>
    <button type="submit" class="btn btn-primary"> Sign up </button>
  </form>
</div>
<script>
  function validateEmailAjax() {
    const email = document.getElementById('email').value;
    const xhttp = new XMLHttpRequest(); //creates the XMLHttpRequest object
    xhttp.onreadystatechange = function() { //function called when request is completed
      // do whatever you want with the response received from the server
      if (this.readyState == 4 && this.status == 200) {
        response = JSON.parse(this.responseText);
        document.getElementById("error_email").innerHTML = response.inuse ? "Email in use" : "";
      }
    };
    xhttp.open("GET", "/user/validate/" + encodeURI(email), true); //define where should the request be made to
    xhttp.send(); // execute the call
  }

  async function  validateEmailFetch() {
    const email = document.getElementById('email').value;
    const response = await fetch("/user/validate/" + encodeURI(email)); // execute the call to the server side
    console.log("response", response.json());
      // .then(response => { //function called when request is completed
      //   // do whatever you want with the response received from the server
      //   if (!response.ok) {
      //     throw new Error("There was an error");
      //   }
      //   console.log('Response', response.json());
      //   //document.getElementById("error_email").innerHTML = response.inuse ? "Email in use" : "";
      // })
      // .catch(error => {
      //   console.error("Error:", error);
      // });//function called when any error
  }

  const emailInput = document.getElementById('email');
  emailInput.addEventListener('keyup', validateEmailFetch);
</script>