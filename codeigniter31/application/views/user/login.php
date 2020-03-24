<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
    <div class="msg">
    <?php echo $this->session->flashdata('error');?>
    </div>
    <h1>User Login</h1>
    <form action="<?php echo site_url(['user','authenticate']) ?>" method="POST" class="form-inline" role="form">
      <div class="form-group">
        <label class="sr-only" for="">Username</label>
        <input type="text" class="form-control" id="" name="username" placeholder="Your username">
      </div>
      <div class="form-group">
        <label class="sr-only" for="">Password</label>
        <input type="password" class="form-control" id="" name="password" placeholder="Your password">
      </div>

      <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
