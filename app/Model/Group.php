<?php
  /**
   * Group Model $Group
   *
   * @category Group_Model
   * @package  None
   * @property Group $Group
   * @author   Display <juan8.hernandez@ucp.edu.co>
   * @license  www.Binlab.IO @Binlab
   * @link     www.Binlab.IO
   */
class Group extends AppModel
{
    public $name = 'Group';

    public $validate = array(
      'name' => array(
                'notBlank' => array(
                    'rule'    => array('notBlank'),
                    'message' => 'Campo obligatorio'
                )
            ),
        );
}

?>