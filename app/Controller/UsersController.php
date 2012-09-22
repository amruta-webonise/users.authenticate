<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 21/9/12
 * Time: 3:23 PM
 * To change this template use File | Settings | File Templates.
 */
class UsersController extends AppController
{
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');
    public $scaffold = 'admin';

    public function index()
    {
        $this->set('users', $this->User->find('all'));
    }

    public function view($id)
    {
        $this->User->id = $id;
        $this->set('user', $this->User->read());

    }

    public function isAuthorized($user) {

        if ($this->action === 'index' || $this->action === 'logout' || $this->action === 'login' || $this->action === 'view') {
            return true;
        }
        return parent::isAuthorized($user);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->saveAssociated($this->request->data, array('deep' => true))) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'login'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->saveAssociated($this->request->data, array('deep' => true))) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
    public function beforeFilter() {
        $this->Auth->allow('add');
    }


    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Invalid username or password'));
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }
}
?>