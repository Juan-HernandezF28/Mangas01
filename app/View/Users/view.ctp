<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del critico.</title>
</head>
<body>
    <div class='container'>
        <div class='card'>
                <h2><strong style='color:green;'>Perfil del critico</strong></h2>
                <h4>identificacion  : <?php echo($critico['User']['id']); ?></h4>
                <h4>Nombre completo : <?php echo($critico['User']['fullname']); ?></h4>
                <h4>Correo          : <?php echo($critico['User']['username']); ?></h4>
                <h4>Grupo           : <?php echo($critico['User']['group_id']); ?></h4>
        </div>
        <button class='btn btn-danger'> <?php echo $this->Html->link('return',
            array('controller'=> 'Posts',
                  'action' => 'index')); ?> </button>        
    </div>
</body>
</html>