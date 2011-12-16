<?php

/**
 * 
 *
 * @author Darius <darius.lenkauskis@yahoo.com>
 */
class SystemController extends Zend_controller_Action
{
    public function indexAction()
    {
        
    }
    
    public function createAction()
    {
        $form = new Application_Form_System();
        $request = $this->_request;
        if($request->isPost()) {
            if($form->isValid($request->getPost())) {
                echo 'IS buvo ivesta';
            }
        }
        $this->view->form = $form;
    }
    
    public function deleteAction()
    {
        $this->view->name = 'aa';
    }
    
    public function editAction()
    {
        $this->view->name = 'BB';
    }
}