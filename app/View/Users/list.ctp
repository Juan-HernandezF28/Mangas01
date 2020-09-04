<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
</head>
<body>
  <div class='container'>
    <div class='card'>
      <h1 style='color:#360F13;'>Lista de Usuarios</h1>
      <table class="table table-striped table-info">
        <thead>
          <tr>
            <th scope="col" style='color:blue;'>Group</th>
            <th scope="col" style='color:blue;'>Fullname</th>
            <th scope="col" style='color:blue;'>Username</th>
            <th scope="col" style='color:blue;'>Img</th>
            <th scope="col" style='color:blue;'>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($users as $user): ?>
            <tr>
              <td style='color:black;'> <?php echo $user['User']['group_id']; ?> </td>
              <td> <?php echo $user['User']['fullname']; ?> </td>
              <td> <?php echo $user['User']['username']; ?> </td>
              <td> 
                <figure class="d-flex justify-content-center">
    				      <?php echo $this->Html->image(
    				      	  'SiluetaPrueba.jpg',
                       array('class' => array('rounded-circle'),
                             'class' => 'd-block w-25'));
    				      ?> 
    				    </figure>
              </td>
              <td>
                <button class='btn btn-warning'> <?php echo $this->Html->link('Edit', 
                              array('controller' => 'users',
                                  'action' => 'edit', $user['User']['id'])); ?> 
                </button>
                
                <button class='btn btn-danger'> <?php echo $this->Html->link('Delete', 
                              array('action' => 'delete', $user['User']['id'])); ?> 
                </button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>       
    </div>
    <button class='btn btn-success'>
              <a href="<?php echo $this->Html->url('/Users/add');?>">Agregar Usuario.</a>
            </button> </td> 
  </div>
</body>
</html>