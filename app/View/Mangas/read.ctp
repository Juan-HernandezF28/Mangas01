<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main rol='main'>
        <div class='card'>
            <h4 class='text-center'> <?php echo $manga['Manga']['nombre']; ?> </h4>
            <div class='row'>
                <div class='row'>
                    <select name="Tomos" id="">
                        Tomos del Manga
                    </select>
                    <div clas='col lg-6'>
                    </div>
                    <div clas='col lg-6'>
                    </div>
                </div>    
                <div class='col lg-6 text-right'>
                    <button type="button" onclick="pageController.previous()" 
                            class="btn btn-labeled btn-sm btn-danger btn-next-page">
                        <span class="btn-label  custom-btn-label-right">
                            <i class="fa fa-arrow-left"></i>
                        </span><strong class="hidden-xs">Anterior</strong>
                    </button>
                </div>
                <div class='col lg-6'>
                    <button type="button" onclick="pageController.next()" 
                            class="btn btn-labeled btn-sm btn-danger btn-next-page">
                        <span class="btn-label  custom-btn-label-left">
                        </span><strong class="hidden-xs">Siguiente</strong>
                        <i class="fa fa-arrow-right"></i>
                    </button>
                </div>
            </div>    
            <div class='row'>
                <div class='col lg-12'>
                    <a href="">
                        <figure class="d-flex justify-content-center">
                        	<?php echo $this->Html->image(
                        	      	$manga['Manga']['image'],
                                    array('class' => array('rounded-circle'),
                                            'class' => 'd-block w-50'));
                        	?> 
                        </figure>
                    </a>
                </div>
            </div>
        </div>  
    </main>
</body>
</html>