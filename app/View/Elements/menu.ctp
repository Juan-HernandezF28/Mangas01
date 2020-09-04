<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
</head>
  <main rol='main'>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-danger">
            <a class="navbar-brand" href="#">
              <i class="fab fa-wolf-pack-battalion"></i>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="<?php echo $this->Html->url('/Users/index/');?>"
                      style='color:#59191F;'>Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo $this->Html->url('/posts/index/');?>"
                      style='color:#59191F;'>Users Posts</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" 
                      role="button" data-toggle="dropdown" aria-haspopup="true" 
                      aria-expanded="false" style='color:#59191F;'>
                    Listas
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/cakephp/Users/list/">Users</a>
                    <a class="dropdown-item" href="/cakephp/posts/index/">Posts</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/cakephp/Mangas/index/" style='color:#59191F;'>Mangas</a>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true" style='color:#59191F;'>Mangas Online</a>
                </li>
              </ul>
              <?php echo $this->Form->create('Manga', array('type' => 'GET',
                        'type' => 'search',
                        'class' => 'navbar-form navbar-left',
                        'url' => array('controller' => 'Mangas',
                        'action' => 'searchJson'))); ?> 

              <div class="form-group">
                <div class='col lg-6'>
                  <?php echo $this->Form->input('search', array(
                    'label' => false,
                    'div' => false,
                    'id' => 'x',
                    'class' => 'form-control x',
                    'autocomplete' => 'off',
                    'placeholder' => 'Buscar Manga')); ?>
                </div>
              </div>
              <div class='col lg-6'>
                <?php echo $this->Form->button('Buscar', array(
                    'div' => false,
                    'class' => 'btn btn-primary')); ?>
                <?php echo $this->Form->end(); ?>
              </div>
              <!-- <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Mangas" aria-label="Search">
                <button class="btn btn-outline-ligth my-2 my-sm-0" type="submit">Search</button>
              </form> -->
            </div>
        </nav>
    </div>
  </main>  
  <!-- <footer class="text-muted">
        <div class="container">
          <p class="float-right">
            <a href="#">Back to top</a>
          </p>
          <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
          <p>New to Bootstrap? <a href="https://getbootstrap.com/">Visit the homepage</a> or read our <a href="../getting-started/introduction/">getting started guide</a>.</p>
        </div>
  </footer>-->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
  <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
</html>