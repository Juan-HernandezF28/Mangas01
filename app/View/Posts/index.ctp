<?php 
    $this->Paginator->options(
        array(
            'update'   => '#container-posts',
            'before'   => $this->Js->get('#procesando')->effect('fadeIn', 
                                                    array('buffer' => false)),
            'complete' => $this->Js->get('#procesando')->effect('fadeOut',
                                                    array('buffer' => false))

        ));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post del usuario</title>
</head>
<body>
    
    <div id='container-posts'>
        <h1 style='color:#003D4C;'>Post de los usuarios.</h1>
        <div class='card'>
            <div class='container'>
                <div class="progress" id='procesando'>
                    <div class='oculto' class="progress-bar-striped active bg-info" role="progressbar" 
                        style="width: 100%" aria-valuenow="50" aria-valuemin="0" 
                        aria-valuemax="100">
                    </div>
                </div>
                <table class='table table-dark'>
                    <tr>
                        <th class='center'><?php echo $this->Paginator->sort('User.id','ID'); ?></th>
                        <th class='center'><?php echo $this->Paginator->sort('fullname','Fullname');?></th>
                        <th class='center'><?php echo $this->Paginator->sort('username','Usuario');?></th>
                        <th class='center'><?php echo $this->Paginator->sort('title','Title');?></th>
                        <th class='center'><?php echo $this->Paginator->sort('body','Posts');?></th>
                        <th class='actions'> <?php echo __('Actions'); ?> </th>
                    </tr>

                    <?php foreach($users as $user): ?>
                        <tr>
                            <?php foreach($posts as $post): ?>
                                <?php if($user['User']['id'] == $post['Post']['user_id']): ?>
                                    <td><?php echo($post['Post']['id']); ?></td>
                                    <td><?php echo($user['User']['fullname']); ?></td>
                                    <td><?php echo($user['User']['username']); ?></td>
                                    <td><?php echo($post['Post']['title']) ?: 'Sin actividad'; ?></td>
                                    <td><?php echo($post['Post']['body']) ?: 'Sin actividad'; ?></td>  
                                <!-- < ?php elseif($user['User']['group_id'] == 4 || isset($post['Post']['title'])): ?> -->
                                    <td> 
                                        <button class='btn btn-info'><?php echo $this->Html->link('View',
                                                    array('controller' => 'users',
                                                        'action' => 'view', $user['User']['id'])); ?> </button>
                                    </td>
                                    <td>
                                        <button class='btn btn-warning'><?php echo $this->Html->link('Edit', 
                                                array('controller' => 'Posts','action' => 'edit',
                                                        $post['Post']['id']));?></button>
                                    </td>
                                    <td>
                                        <button class='btn btn-danger'><?php echo $this->Html->link('Eliminar',
                                                array('action' => 'delete', $post['Post']['id']),
                                                        '¿Desea eliminar el registro seleccionado?'); ?>
                                    </td>  
                                <?php endif; ?>    
                            <?php endforeach; ?>
                        </tr>    
                    <?php endforeach; ?>
                </table>
                <!-- <nav aria-label="Page navigation example">
                  <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                  </ul>
                </nav> -->
            </div>
            <p>
                <?php echo $this->Paginator->counter(array(
                        'format' => __('Page {:page} of {:pages},
                                        showing {:current} records outs of {:count} total,
                                        starting of record {:start},
                                        ending on {:end}')
                    )); 
                ?>
            </p>
            <ul class='pagination'>
                <li>
                    <?php echo $this->Paginator->prev(__('previous').'<', 
                        array(
                            'tag' => false),
                        null,
                        array(
                            'class' => 'prev disabled')   
                    ); ?>
                </li>
                <?php echo $this->Paginator->numbers(array(
                        'separator'    => '',
                        'tag'          => 'li',
                        'currentTag'   => 'a',
                        'currentClass' => 'active'
                    )); 
                ?>
                <li>
                    <?php echo $this->Paginator->next(__('next').'>', 
                            array(
                                'tag' => false
                            ),
                            null,
                            array(
                                'class' => 'next disabled'
                            )
                        );
                    ?>
                </li>
            </ul>
            <?php echo $this->Js->writeBuffer(); ?>      
        </div>
        <div class='row'>
            <div class="col-lg-12 text-right">
                <button class='btn btn-success'><a href="<?php echo $this->Html->url('/Posts/add');?>">Agregar posts.</a></button>
            </div>
        </div>
    </div>        
</body>
</html>