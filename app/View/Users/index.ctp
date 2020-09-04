<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <figure class="d-flex justify-content-center">
				    	<?php echo $this->Html->image(
				  			  'Tomo_12_DBS.png',
                   array('class' => array('rounded-circle'),
                         'class' => 'd-block w-25'));
				  	?> 
				  </figure>
        </div>
        <div class="carousel-item">
          <figure class="d-flex justify-content-center">
				    	<?php echo $this->Html->image(
				  			  'kimetsu-tomo-20.jpg',
                   array('class' => array('rounded-circle'),
                         'class' => 'd-block w-25'));
				  	?> 
				  </figure>
        </div>
        <div class="carousel-item">
          <figure class="d-flex justify-content-center">
				    	<?php echo $this->Html->image(
				  			  'onepunchman-tomo20.jpg',
                   array('class' => array('rounded-circle'),
                         'class' => 'd-block w-25'));
				  	?> 
				  </figure>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
        <span class="sr-only"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
      </a>
    </div>
  </div>

</body> 
</html>