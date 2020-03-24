<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
    <div class="msg">
    <?php echo $this->session->flashdata('error');?>
    </div>
    <h1>User Info</h1>

    <div class="container">
      <table>
        <tbody>
          <tr><th>Name</th><th>Username</th></tr>
          <tr><td><?php echo $user->name ?></td><td><?php echo $user->username ?> </td></tr>

        </tbody>
      </table>

    </div>
</div>