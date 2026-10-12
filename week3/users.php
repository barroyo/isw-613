<?php
  include('utils/functions.php');
  $provinces = getUsers();
  $error_msg = '';
  if(isset($_GET['error'])) {
    $error_msg = $_GET['error'];
  }
?>
 <?php require('inc/header.php') ?>
  <div class="container-fluid">
    <div class="jumbotron">
      <h1 class="display-4">Users</h1>
      <p class="lead">Users list</p>
      <hr class="my-4">
    </div>
    <<table class="table">
      <thead>
        <tr>
          <th></th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td scope="row"></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td scope="row"></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>

</body>

</html>