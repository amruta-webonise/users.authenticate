<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 21/9/12
 * Time: 4:34 PM
 * To change this template use File | Settings | File Templates.
 */

class ProfilesController extends AppController
{
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');


    public function add() {
        if ($this->request->is('post')) {
            $this->Profile->create();
            if ($this->Profile->save($this->request->data)) {
                $this->Session->setFlash('profile added');
                pr($this->request->data);die;
                $this->redirect(array('controller' => 'users', 'action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to add user.');
            }
        }
    }
}

?>