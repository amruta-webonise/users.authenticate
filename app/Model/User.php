<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 21/9/12
 * Time: 3:13 PM
 * To change this template use File | Settings | File Templates.
 * */

class User extends AppModel {
    public $name = 'User';
    public $hasOne = 'Profile';
   // public $hasMany = 'RolesUser';

    public $validate = array(
        'username' => array(
            'rule' => 'notEmpty'
        ),
        'password' => array(
            'rule' => 'notEmpty'
        )
    );
    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }

}
?>