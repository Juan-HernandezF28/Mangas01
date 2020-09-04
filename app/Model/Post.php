<?php

   /**
    * Post Model $Post
    *
    * @category Post_Model
    * @package  None
    * @property User $User
    * @property Post $Post
    * @author   Display <juan8.hernandez@ucp.edu.co>
    * @license  www.Binlab.IO @Binlab
    * @link     www.Binlab.IO
    */
class Post extends AppModel
{
    public $name = 'Post';
    public $validate = array(
      'user_id' => array(
          'notBlank' => array(
              'rule'    => array('notBlank'),
              'message' => 'Campo obligatorio'
          )),
      'title' => array(
          'notBlank' => array(
              'rule'    => array('notBlank'),
              'message' => 'Campo obligatorio'
          ),
      ),
      'body' => array(
          'notBlank' => array(
              'rule'    => array('notBlank'),
              'message' => 'Campo obligatorio',
              'on'      => 'create',
          ),
      ),
      'created' => array(
          'notBlank' => array(
              'rule'    => array('notBlank'),
              'message' => 'Campo obligatorio'
          )
      )
     );
    public $belongsTo = array(
      'User' => array(
          'className'  => 'User',
          'foreignKey' => 'user_id'
      ));

      /**
       * Esta poseida por :D
       * 
       * @param integer $post $user
       * 
       * @return bool
       */
    public function isOwnedBy($post, $user)
    {
        return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
    }
      
    
    /**
     * Post de cada usuario
     * 
     * @return array $object
     */
    // public function usersPost()
    // {
    //     // $criticos = $this->User->find('all');

    //     $posts = $this->Post->find('all');

    //     $object = array();

    //     // foreach ($criticos as $user) {
    //     //     foreach ($posts as $post) {
    //     //         $object[$user['User']['id']] = array(
    //     //           $post['Post']['title'],
    //     //           $post['Post']['body']
    //     //         );
    //     //     }   
    //     // }

    //     return $posts;
    // }
}

?>