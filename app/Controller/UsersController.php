<?php
/**
 * Users Controller
 *
 * @category Users_Controller
 * @package  None
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @author   Display <juan8.hernandez@ucp.edu.co>
 * @license  www.Binlab.IO @Binlab
 * @link     www.Binlab.IO
 */
class UsersController extends AppController
{
    public $helpers = array ('Html','Form');
    public $components = array('RequestHandler', 'Session');

    /**
     * Components
     * 
     * @var array
     */
    public $paginate = array(
        'limit' => 4,
        'order' => array(
            'User.id' => 'asc'
        )
    );

    /**
     * Antes de cargar
     * 
     * @return void
     */
    public function beforeFilter() 
    {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout');
    }

    /**
     * Inicio de sesion del usuario
     * 
     * @return void
     */
    public function login()
    {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Session->setFlash(__('Invalid username or password, try again'));
        }
    }
    
    /**
     * Cierre de sesion del usuario
     * 
     * @return void
     */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Centro de usuarios
     * 
     * @return void
     */
    function index()
    {
        $this->set('users', $this->User->find('all'));
    }

    /**
     * Vista de cada usuario
     *
     * @param integer $id = null
     *
     * @return void
     */
    function view($id = null) 
    {

        if (!$id) {
            $this->Session->setFlash('el usuario no existe en la base de datos');
        }
        $critico = $this->User->findById($id);
        if (!$critico) {
            $this->Session->setFlash(
                'Este critico no existe.',
                'default', array('class' => 'alert alert-success')
            );
        }
        $this->set('critico', $critico);
    }

    /**
     * Agregar usuarios
     * 
     * @return void
     */
    public function add()
    {
        $group = $this->User->Group->find('list');
        $this->set(compact('group', $group));
        
        if ($this->request->is('post', 'put')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(
                    'Usuario creado exitosamente',
                    'default', array('class' => 'success')
                );
                return $this->redirect(array('action' => 'index'));
            
            } else {
                $this->Session->setFlash(
                    'El usuario no ha sido creado',
                    'default', array('class' => 'danger')
                );
                return $this->redirect(array('action' => 'index'));
            }
          
        }
    }
    
    /**
     * Editar los Usuarios
     * 
     * @param integer $id = null
     * 
     * @return void
     */
    public function edit($id = null)
    {
        if (!$id) {
            $this->Session->setFlash('el usuario no existe en la base de datos');
        }

        $critico = $this->User->findById($id);
        $group = $this->User->Group->find('list');
        $this->set(compact('group', $group));
        
        if (!$critico) {
            $this->Session->setFlash(
                'Este critico no existe.',
                'default', array('class' => 'alert alert-success')
            );
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->User->id = $id;
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been updated.', 'default', array('class' => 'success')));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update your post.'));
        }
    
        if (!$this->request->data) {
            $this->request->data = $critico;
        }

    }

    /**
     * Borrar Usuario
     * 
     * @param integer $id = null
     * 
     * @return void
     */
    function delete($id = null)
    {
        if (!$this->User->exists($id)) {
            $this->Session->setFlash(
                'Dato no v&aacute;lido', 
                'default', 
                array('class' => 'danger')
            );
            return $this->redirect(array('action' => 'list'));
        }
        if ($this->User->delete($id)) {
            $this->Session->setFlash(
                'Informaci&oacute;n procesada correctamente', 
                'default', 
                array('class' => 'success')
            );
            return $this->redirect(array('action' => 'list'));
        }

        $this->Session->setFlash(
            'La informaci&oacute;n no fue procesada. Por favor intente nuevamente', 
            'default', 
            array('class' => 'danger')
        );
        return $this->redirect(array('action' => 'list'));
    }

    /**
     * Tabla de Usuarios
     * 
     * @return void
     */
    function list()
    {
        $this->set('users', $this->User->find('all'));
    }
}    