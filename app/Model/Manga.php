<?php
  /**
   * Manga Model $Manga
   *
   * @category Group_Model
   * @package  None
   * @property Manga $Manga
   * @author   Display <juan8.hernandez@ucp.edu.co>
   * @license  www.Binlab.IO @Binlab
   * @link     www.Binlab.IO
   */
class Manga extends AppModel
{
    public $name = 'Manga';

    public $validate = array(
      'name' => array(
                'notBlank' => array(
                    'rule'    => array('notBlank'),
                    'message' => 'Campo obligatorio'
                )
            ),
        );
}