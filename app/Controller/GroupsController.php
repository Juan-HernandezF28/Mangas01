<?php
 
    /**
     * Groups Controller
     *
     * @category Groups_Controller
     * @package  None
     * @property Group $Group
     * @property PaginatorComponent $Paginator
     * @property SessionComponent $Session
     * @author   Display <juan8.hernandez@ucp.edu.co>
     * @license  www.Binlab.IO @Binlab
     * @link     www.Binlab.IO
     */
class GroupsController extends AppController
{

    public $helpers = array ('Html','Form');
    
    /**
     * Centro de usuarios
     * 
     * @return void
     */
    function index()
    {
        $this->set('rol', $this->Rol->find('all'));
    }

    /**
     * Agregar usuario
     *
     * @return void
     */
    function add()
    {
        $this->set('rol', $this->Rol->find('all'));
    }
}

?>