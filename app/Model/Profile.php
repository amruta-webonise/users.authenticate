<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 21/9/12
 * Time: 3:17 PM
 * To change this template use File | Settings | File Templates.
 */
class Profile extends AppModel {
    public $name = 'Profile';
    public $belongsTo = 'User';
    public $validate = array(
        'name' => array(
            'rule' => 'notEmpty'
        ),
        'email' => array(
            'rule' => 'notEmpty'
        )
    );
}
?>