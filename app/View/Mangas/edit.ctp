<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo $this->Form->create('Manga'); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php echo $this->Form->input('nombre',
                    array(
                        'type'        => 'text',
                        'label'       => array('style' => 'width:100%;',
                                        'text' => 'Nombre'),
                        'placeholder' => 'Titulo de la obra',
                        'value'       => $manga['Manga']['nombre']
                    )
                );
                ?>    
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php echo $this->Form->input('description', array(
                        'type'        => 'text',
                        'label'       => array('style' => 'width:100%;',
                                            'text' => 'Sinopsis'),
                        'rows'        => 6,
                        'placeholder' => 'Descripcion de la obra',
                        'value'       => $manga['Manga']['description']    
                    ));
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col lg-12">
                    <?php echo $this->Form->input('image', array(
                        'type'  => 'file',
                        'label' => array('style' => 'width:100%',
                                        'text' => 'Portada'),
                        'value' => $manga['Manga']['image']
                    )); 

                    ?>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class="col-lg-6 text-right">
                <button class='btn btn-danger'><?php echo $this->Html->link('Cancelar', 
                            array( 'action' => 'index')); ?> </button>
            </div>
            <div class='col lg-6 text-left'>
                <?php echo $this->Form->submit('Guardar', array(
                                        'class' => 'btn btn-success'
                    )); ?> 
                
            </div>
        </div>
    </div>    
</body>
</html>