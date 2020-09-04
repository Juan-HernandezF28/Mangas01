<?php

/**
 * Posts Controller
 *
 * @category Posts_Controller
 * @package  None
 * @property Post $Post
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @author   Display <juan8.hernandez@ucp.edu.co>
 * @license  www.Binlab.IO @Binlab
 * @link     www.Binlab.IO
 */
class PostsController extends AppController
{
    /**
     * Components
     * 
     * @var array
     */
    public $components = array('RequestHandler', 'Session');
    
    public $helpers = array ('Html','Form', 'Time', 'Js');

    public $paginate = array(
        'limit' => 3,
        'order' => array(
            'Post.id' => 'asc',
            'User.username' => 'asc',
            'User.fullname' => 'asc'
        )
    );

    /**
     * Autoriza los usuarios
     * 
     * @param String $user
     * 
     * @return parent::isAuthorized($user)
     */
    public function isAuthorized($user)
    {
        // All registered users can add posts
        if ($this->action === 'add') {
            return true;
        }
    
        // The owner of a post can edit and delete it
        if (in_array($this->action, array('edit', 'delete'))) {
            $postId = (int) $this->request->params['pass'][0];
            if ($this->Post->isOwnedBy($postId, $user['id'])) {
                return true;
            }
        }
    
        return parent::isAuthorized($user);
    }

    /**
     * Centro de usuarios
     * 
     * @return void
     */
    function index()
    {
        $this->loadModel('User');
        $this->User->recursive = 0;

        $this->paginate['User']['Limit'] = 3;
        $this->paginate['User']['order'] = array('User.username' => 'asc',
                                                'User.fullname' => 'asc');
        $prueba = $this->User->find('all');
        $this->set('users', $prueba);
        $this->set('users', $this->paginate());
        $this->Post->recursive = 0;

        $this->paginate['Post']['Limit'] = 3;
        $this->paginate['Post']['order'] = array('Post.id' => 'asc');
        // $this->paginate['Post']['conditions'] = array('Post.user_id' => '');

        $this->set('posts', $this->paginate());

    }

    /**
     * Vista de cada usuario
     *
     * @return void
     */
    function view()
    {
        $this->set('posts', $this->Post->find('all'));
        $this->set('users', $this->User->find('all'));

    }

    /**
     * Agregar usuario
     *
     * @return void
     */
    function add()
    {
        $this->set('posts', $this->Post->find('all'));

        $users = $this->Post->User->find(
            'list',
            array(
              'fields' => array
                    ('id', 'fullname'),
              'recursive' => -1)
        );

        $this->set('users', $users);

        // print_r($users);
        //$this->log($this->request->data);

        if ($this->request->is('post', 'put')) {
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');
            $this->Post->create();
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash(
                    'Usuario creado exitosamente',
                    'default',
                    array(
                      'class' => 'success')
                );
                return $this->redirect(array('action' => 'index'));
            } else {
                    $this->Session->setFlash(
                        'El usuario no ha sido creado', 
                        'default', 
                        array('class' => 'danger')
                    );
                    return $this->redirect(array('action' => 'index'));
            }
                
        }
    }

    /**
     * Edicion de usuario
     *
     * @param integer $id = null
     *
     * @return void
     */
    function edit($id = null)
    {
        if (!$id) {
            $this->Session->setFlash('el usuario no existe en la base de datos');
        }

        $blog = $this->Post->findById($id);

        $users = $this->Post->User->find(
            'list',
            array('fields' => array
            ('id', 'fullname'),
            'recursive' => -1)
        );

        $this->set('users', $users);

        if (!$blog) {
            $this->Session->setFlash(
                'Este critico no existe.',
                'default',
                array('class' => 'alert alert-success')
            );
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Post->id = $id;
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been updated.', 'default', array('class' => 'success')));
                    return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update your post.'));
        }
    
        if (!$this->request->data) {
            $this->request->data = $blog;
        }

    }

    /**
     * Borrar usuario
     *
     * @param integer $id = null
     *
     * @return void
     */
    function delete($id = null)
    {
        $this->Post->id = $id;

        if (!$this->Post->exists()) {
            $this->Session->setFlash(
                'Dato no v&aacute;lido', 
                'default', 
                array('class' => 'danger')
            );
            return $this->redirect(array('action' => 'index'));
        }
        if ($this->Post->delete()) {
            $this->Session->setFlash(
                'Informaci&oacute;n procesada correctamente', 
                'default', 
                array('class' => 'success')
            );
            return $this->redirect(array('action' => 'index'));
        }

        $this->Session->setFlash(
            'La informaci&oacute;n no fue procesada. Por favor intente nuevamente', 
            'default', 
            array('class' => 'danger')
        );
        return $this->redirect(array('action' => 'index'));
    }
}
