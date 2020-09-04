<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <?php echo $this->Form->create('User'); ?>
        <h2> Editar Usuario </h2>
        <div class="row">
            <div class="col-lg-6">

                <?php echo $this->Form->input('fullname',array(
                        'type'  => 'text',
                        'label' => array('style' => 'width:100%;',
                                        'text' => 'Nombre completo')                
                    )
            
                    );
                ?>
            </div>    
            <div class="col-lg-6">    
                <?php echo $this->Form->input('username', array(
                        'type'  => 'text',
                        'label' => array('style' => 'width:100%;',
                                        'text' => 'Correo Electronico')
                    ));
                ?>
            </div>
        </div>
        <div class="row">      
            <div class="col-lg-6">
                <?php echo $this->Form->input('password', array(
                        'type'  => 'text',
                        'label' => array('style' => 'width:100%;',
                                        'text' => 'Contraseña')                
                    )); 
                ?>
            </div>
            <div class="col-lg-6">
                <?php echo $this->Form->input('group_id', array(
                        'type'    => 'select',
                        'empty'   => '---',
                        'options' => $group,
                        'label'   => array('style' => 'width:100%;',
                                            'text' => 'Grupo')                                    
                
                    ));
                ?>
            </div>        
        </div>
        <div class='row'>
            <div class='col-lg-12'>
                <button class='btn btn-success'> <?php echo $this->Form->end('Guardar'); ?> </button>
            </div>
        </div>        
</body>
</html>