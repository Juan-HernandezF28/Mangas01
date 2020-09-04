<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
    <title style='color:red'>Catalogo de Mangas</title>
    <h1 class='text-center'>Catalogo de Mangas</h1>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <figure class="d-flex justify-content-center">
	  		  	<?php echo $this->Html->image(
	  					  'onepunchman-tomo20.jpg',
                 array('class' => array('rounded-circle'),
                       'class' => 'd-block w-25'));
	  			  ?> 
	  		</figure>
        <div class="carousel-caption d-none d-md-block">
          <!-- <h4 styke='color:black'>First slide label</h4>
          <p style='color:black'>
            <strong>
              Nulla vitae elit libero, a pharetra augue mollis interdum.
            </strong>  
          </p> -->
        </div>
      </div>
      <div class="carousel-item">
        <figure class="d-flex justify-content-center">
	  			<?php echo $this->Html->image(
	  					  'kimetsu-tomo-20.jpg',
                 array('class' => array('rounded-circle'),
                       'class' => 'd-block w-25'));
	  			?> 
	  		</figure>
        <div class="carousel-caption d-none d-md-block">
          <!-- <h5>Second slide label</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
        </div>
      </div>
      <div class="carousel-item">
          <figure class="d-flex justify-content-center">
	  			    	<?php echo $this->Html->image(
	  			  			  'Tomo_12_DBS.png',
                     array('class' => array('rounded-circle'),
                           'class' => 'd-block w-25'));
	  			  	?> 
	  		  </figure>
        <div class="carousel-caption d-none d-md-block">
          <!-- <h5>Third slide label</h5>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p> -->
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
<link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/album/">

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="album.css" rel="stylesheet">
  </head>
  <body>
    <main role="main">
      <section class="jumbotron text-center">
        <div class="container">
          <p>
            <button class='btn btn-info my-2'>
              <?php echo $this->Html->link('Inicio', array('controller' => 'Users',
                                          'action' => 'index'));?>
            </button>
            <button class='btn btn-success my-2'>
              <?php echo $this->Html->link('Agregar manga', array('action' => 'add'));?>
            </button>
          </p>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
            <?php foreach($mangas as $manga): ?>
                <div class="col-md-3">
                  <h5><?php echo $manga['Manga']['nombre']; ?></h5>
                  <div class="card mb-4 shadow-sm">
                    <figure class="d-flex justify-content-center">
                      <a href="/cakephp/Mangas/read/<?php echo $manga['Manga']['id']; ?>">
    				            <?php echo $this->Html->image(
    				        	  	  $manga['Manga']['image'],
                             array('class' => 'd-block w-50'));
    				        	  ?> 
                      </a>
    				        </figure>
                    <text x="50%" y="50%" 
                          fill="#eceeef" dy=".3em">Manga</text>
                    </svg>
                    <div class="card-body">
                      <p class="card-text"> <?php echo $manga['Manga']['description']; ?> </p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-outline-secondary btn-warning">
                            <?php echo $this->Html->link('Edit',
                                                    array('action' => 'edit', $manga['Manga']['id'])); ?>
                          </button>
                          <button type="button" class="btn btn-sm btn-outline-secondary btn-danger">
                            <?php echo $this->Html->link('Delete',
                                                    array('action' => 'delete', $manga['Manga']['id']),
                                                            '¿Desea eliminar el registro seleccionado?'); ?>
                            </button>
                        </div>
                        <small class="text-muted"> <?php echo(date('h:i:s')); ?> </small>
                      </div>
                    </div>
                  </div>
                </div>
            <?php endforeach; ?>    
          </div>
        </div>
      </div>
    </main>
    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Back to top</a>
        </p>
        <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
        <p>New to Bootstrap? <a href="https://getbootstrap.com/">Visit the homepage</a> or read our <a href="../getting-started/introduction/">getting started guide</a>.</p>
      </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
          <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
          <!-- <script>
            $('.formulario').$(container).submit(function (e) { 
              e.preventDefault();
              
            });
          </script> -->
</html>
