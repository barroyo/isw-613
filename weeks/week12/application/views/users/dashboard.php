<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
  <div class="container-fluid">
    <div class="jumbotron">
      <h1 class="display-4">Dashboard</h1>
      <p class="lead">Welcome</p>
      <hr class="my-4">
    </div>
    <div class="row">
      <div class="msg">
        <?php echo $this->session->flashdata('msg');?>
      </div>
    </div>
    <div class="row">
      <a class="btn btn-primary" href="<?php echo site_url('user/add');?>">Add</a>
      <table class="table table-light">
        <tbody>
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Actions</th>
          </tr>
          <?php
            foreach ($users as $user) { ?>
              <tr>
                <td><?php echo $user['name'] ?></td>
                <td><?php echo $user['lastname'] ?></td>
                <td>
                  <a class="btn btn-secondary" href="<?php echo site_url(['user','edit',$user['id']]);?>">Edit</a>
                  <a class="btn btn-danger" href="<?php echo site_url(['user','delete',$user['id']]);?>">Delete</a>
                </td>
              </tr>
            <?php } ?>
        </tbody>
      </table>
      <a class="btn btn-primary" href="<?php echo site_url('user/add');?>">Add</a>
    </div>

  </div>
</body>
</html>