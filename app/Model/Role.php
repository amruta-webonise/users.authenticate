<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 21/9/12
 * Time: 3:21 PM
 * To change this template use File | Settings | File Templates.
 */
class Role extends AppModel {
    public $name = 'Role';
    public $belongsTo = 'User';
}
?>