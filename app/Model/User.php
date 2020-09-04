<?php 

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

 /**
  * User Model $User
  *
  * @category User_Model
  * @package  None
  * @property Group $Group
  * @property User $User
  * @author   Display <juan8.hernandez@ucp.edu.co>
  * @license  www.Binlab.IO @Binlab
  * @link     www.Binlab.IO
  */         
class User extends AppModel
{
    public $name = 'User';
    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'fullname' => array(
            'notBlank' => array(
                'rule'    => array('notBlank'),
                'message' => 'Campo obligatorio'
            )),
        'username' => array(
            'notBlank' => array(
                'rule'    => array('notBlank'),
                'message' => 'Campo obligatorio'
            ),
            'isUnique' => array(
                'rule'    => array('isUnique'),
                'message' => 'El email ya esta registrado. Intente con otro.'
            )
            ),
            'password' => array(
                'notBlank' => array(
                    'rule'    => array('notBlank'),
                    'message' => 'Campo obligatorio',
                    'on'      => 'create',
                ),
            ),
            'group_id' => array(
                'notBlank' => array(
                    'rule'    => array('notBlank'),
                    'message' => 'Campo obligatorio'
                )
                ));
    public $belongsTo = array(
        'Group' => array(
            'className'  => 'Group',
            'foreignKey' => 'group_id'
        )
    );

    /**
     * Antes de guardar
     * 
     * @param String $options = array()
     * 
     * @return void
     */
    public function beforeSave($options = array())
    {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }             
}
?>