<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
    <div class="msg">
    <?php echo $this->session->flashdata('error');?>
    </div>
    <h1>User Dashboard</h1>
    <div class="container">
    </div>

    <!-- <nav class="nav">
      <li class="nav-item">
        <a class="nav-link active" href="#">Menu 1</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Hi <?php echo $this->session->user->name ?></a>
        <a class="nav-link disabled" href="<?php echo site_url(['user','logout']); ?>" tabindex="-1" aria-disabled="true">Logout</a>
      </li>
    </nav> -->

    </div>
</div>