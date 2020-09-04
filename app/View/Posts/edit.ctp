<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php echo $this->Form->create(
	'Post', 
	array(
		'type'  => 'file',
		'class' => 'form-horizontal'
	)
);
?>
<div class='card'>
    <div class='card-body'>
        <div class='container'>
            <div class='row'>
                <div class='col-lg-6'>
                    <?php
                        echo $this->Form->input('user_id', array(
                            'type'        => 'select',
                            'empty'       => '---',
                            'options'     => $users,
                            'label'       => array('style' => 'width:100%',
                                                    'text' =>'Nombres y apellidos'),
                            'placeholder' => 'full name',
                            // 'default'     => $users['User']['id']
                        ));
                    ?>

                </div>
                <div class='col-lg-6'>
                    <?php
                        echo $this->Form->input('title', array(
                            'type'        => 'text',
                            'label'       => array('style' => 'width:100%',
                                                    'text' =>'Critica'),
                            'placeholder' => 'Titulo de la critica.'
                        ));
                    ?>
                </div>
            </div>    
            <div class="row"> 
                <div class='col-lg-6'>
                </div>
                <div class='col-lg-6'>
                    <?php
                        echo $this->Form->input('body', array(
                            'type'        => 'text',
                            'label'       => array('style' => 'width:100%',
                                                    'text' =>'Body'),
                            'rows'        => '6',
                            'placeholder' => 'Cuerpo de la critica'
                        ));
                    ?>
                </div>    
            </div>    
        </div>    
    </div>
</div>  
<div class='row'>
    <div class="col lg-12">
        <button class='btn btn-danger text-right'><?php echo $this->Html->link('Cancelar', 
                    array('action' => 'index'),
                    '¿Cancelar?') ?> </button>
        <button class='btn btn-success'><?php echo $this->Form->end('Guardar'); ?> </button>
    </div>
</div>  
</body>
</html>