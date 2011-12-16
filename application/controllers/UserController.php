<?php

/**
 * 
 *
 * @author Darius <darius.lenkauskis@yahoo.com>
 */
class UserController extends Zend_Controller_Action 
{
    public function indexAction()
    {
        $users = new Application_Model_DbTable_Users();
        $this->view->data = $users->fetchAll()->toArray();
    }
    
    public function createAction()
    {
        $form = new Application_Form_User();
        $request = $this->_request;
        if($request->isPost()) {
            if($form->isValid($request->getPost())) {
                echo 'Vartotjas sukurtas';
            }
        }
        $this->view->form = $form;
    }
    
    public function deleteAction()
    {
        $this->view->username = $this->_request->getParam('id'); 
    }
    
    public function editAction()
    {
        $this->view->username = $this->_request->getParam('id');
    }
}