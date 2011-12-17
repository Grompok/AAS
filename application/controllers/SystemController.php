<?php

/**
 * 
 *
 * @author Darius <darius.lenkauskis@yahoo.com>
 */
class SystemController extends Zend_controller_Action
{
    /**
     *
     * @var Application_Model_DbTable_IS 
     */
    private $_db;
    
    public function init()
    {
        if($this->_db === null) {
            $this->_db = new Application_Model_DbTable_IS();
        }
    }

    public function indexAction()
    {
        $this->view->systems = $this->_db->fetchAll();
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