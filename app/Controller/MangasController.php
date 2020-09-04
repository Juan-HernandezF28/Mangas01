<?php

/**
 * Mangas Controller
 *
 * @category Mangas_Controller
 * @package  None
 * @property Mangas $Mangas
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @author   Display <juan8.hernandez@ucp.edu.co>
 * @license  www.Binlab.IO @Binlab
 * @link     www.Binlab.IO
 */
class MangasController extends AppController
{
    /**
     * Components
     * 
     * @var array
     */

    public $components = array('RequestHandler', 'Session');
    
    public $helpers = array ('Html','Form');

    /**
     * Funcion de muestra de productos
     * 
     * @author Display <juan8.hernandez@ucp.edu.co>
     * 
     * @return array
     */
    function index() 
    {
        $this->set('mangas', $this->Manga->find('all'));
    }

    /**
     * Ver descripcion del Manga
     * 
     * @param integer $id = null
     * 
     * @author Display <juan8.hernandez@ucp.edu.co>
     * 
     * @return void 
     */
    function view($id =null)
    {
        if (!$id) {
            $this->Session->setFlash('el usuario no existe en la base de datos');
        }
        $manga = $this->Manga->findById($id);
        
        if (!$critico) {
            $this->Session->setFlash(
                'Este manga no existe.',
                'default', array('class' => 'alert alert-success')
            );
        }
        $this->set('critico', $manga);
    }

    /**
     * Funcion para agregar mangas
     * 
     * @author Display <juan8.hernandez@ucp.edu.co>
     * 
     * @return array
     */
    function add()
    {
        print_r($this->request->data);
        if ($this->request->is('post', 'put')) {
            $this->Manga->create();
            if ($this->Manga->save($this->request->data)) {
                $this->Session->setFlash(
                    'El Manga ha sido creado exitosamente',
                    'default', array('class' => 'success')
                );
                return $this->redirect(array('action' => 'index'));
            
            } else {
                $this->Session->setFlash(
                    'El Manga no pudo ser Agregado',
                    'default', array('class' => 'danger')
                );
                return $this->redirect(array('action' => 'index'));
            }
        }
    }
    
    /**
     * Editar el post del Manga
     * 
     * @param integer $id = null
     * 
     * @author Display"<juan8.hernandez@ucp.edu.co>"
     * 
     * @return void
     */
    function edit($id = null)
    {
        if (!$id) {
            $this->Session->setFlash('Este manga no existe.');
            return $this->redirect(array('action' => 'index'));
        }

        $this->set('manga', $this->Manga->findById($id));

        if ($this->request->is(array('post', 'put'))) {
            $this->Manga->id = $id;
            if ($this->Manga->save($this->request->data)) {
                $this->Session->setFlash(__('Your manga has been updated.', 'default', array('class' => 'success')));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update your post.'));
        }
    
    }

    /**
     * Borrado de mangas
     * 
     * @param integer $id = null
     * 
     * @author Display <juan8.hernandez@ucp.edu.co>
     * 
     * @return void
     */
    function delete($id = null)
    {
        $this->Manga->id = $id;

        if (!$id) {
            $this->Session->setFlash('Este manga no existe.');

            return $this->redirect(array('action' => 'index'));
        }

        if ($this->Manga->delete()) {
            $this->Session->setFlash(
                'Manga Eliminado correctamente', 
                'default', 
                array('class' => 'success')
            );
            return $this->redirect(array('action' => 'index'));
        }

        $this->Session->setFlash(
            'Este Manga no pudo ser Eliminado. Por favor intente nuevamente', 
            'default', 
            array('class' => 'danger')
        );
        return $this->redirect(array('action' => 'index'));

    }

    /**
     * Lectura del manga publicado
     * 
     * @param integer $id = null
     * 
     * @author Display <juan8.hernandez@ucp.edu.co>
     * 
     * @return void
     */
    function read($id = null)
    {
        if (!$id) {
            $this->Session->setFlash('Este manga no existe.');

            return $this->redirect(array('action' => 'index'));
        }

        $this->set('manga', $this->Manga->findById($id));
        
    }

    /**
     * Busqueda en el search del menú
     * 
     * @author Display <juan8.hernandez@ucp.edu.co>
     * 
     * @return void
     */
    function searchJson()
    {
        $term = null;

        if (!empty($this->request->query['term'])) {
            $term = $this->request->query['term'];
            $terms = explode(' ', trim($term));
            $terms = array_diff($terms, array(''));

            foreach ($terms as $term) {
                $conditions[] = array(
                    'Manga.nombre LIKE' => '%' . $items . '%');
            }

            $manga = $this->Manga->find('all', array('recursive' => -1, 'fields' => array('Manga.id', 'Manga.nombre', 'Manga.image', 'Manga.image_dir'), 'conditions' => $conditions, 'limit' => 10));
            print_r($manga);
            echo json_encode($manga);
            $this->autoRender = false;
        }


    }
}
 