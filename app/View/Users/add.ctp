<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div class='container'>
        <?php echo $this->Form->create('User'); ?>
        <div class='card'>
            <h2>Crear Usuario.</h2>
            <div class='row'>
                <div class='col lg-6'>
                    <?php echo $this->Form->input('fullname', array(
                            'type'  => 'text',
                            'label' => array('style' => 'width:100%;',
                                            'text' => 'Nombre completo'),
                            'placeholder' => 'Nombres y Apellidos'
                        )); 
                    ?>
                </div>    
                <div class='col lg-12'>
                    <?php echo $this->Form->input('username', array(
                            'type'  => 'text',
                            'label' => array('style' => 'width:100%',
                                            'text' => 'Correo Electrónico'),
                            'placeholder' => 'username@example.com'                
                        )); 
                    ?>
                </div>
            </div>
            <div class='row'>
                <div class='col lg-6'>
                    <?php echo $this->Form->input('password', 
                                array(
                                    'type'  => 'text',
                                    'label' => array('style' => 'width:100%;',
                                                    'text' => 'Contraseña'),
                                    'placeholder' => '********'                
                                )); 
                    ?>
                </div>  
                <div class='col lg-6'>
                    <?php echo $this->Form->input('group_id', 
                            array(
                                'type'    => 'select',
                                'empty'   => '---',
                                'options' => $group,
                                'label'   => array('style' => 'width:100%;',
                                                    'text' => 'Grupo')
                                                                       
                        )); 
                    ?>
                </div>    
            </div>
        </div>     
        <div class='row'>    
            <div class="col-lg-12">
                <button class='btn btn-success text-right'> <?php echo $this->Form->end('Guardar', array('type' => 'submit')); ?> </button>
                <button class='btn btn-danger'> <?php echo $this->Html->link('Cancelar', array('controller' => 'Users','action' => 'list')); ?> </button>
            </div>
        </div>   
    </div>    
</body>
</html>