<?php
$isAdmin = true;
?>

<nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Brand</a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <?php if($isAdmin) { ?>
          <li class="active"><a href="#">Users <span class="sr-only">(current)</span></a></li>
          <?php }  ?>
          <li><a href="#">Trees</a></li>

          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Hi <?php echo $this->session->user->name ?></a>
          </li>
          <li>
          <a class="nav-link disabled" href="<?php echo site_url(['user','logout']); ?>" tabindex="-1" aria-disabled="true">Logout</a>
          </li>
        </ul>
      </div>
    </div>
</nav>
