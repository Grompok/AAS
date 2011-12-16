<?php

class IndexController extends Zend_Controller_Action
{
    
    public function indexAction()
    { 
        $this->view->headTitle("Pradinis langas");
    }
    
    public function loginAction()
    {
        $this->_helper->layout->disableLayout();
        $form = new Application_Form_Login();
        $request = $this->_request;
        if($request->isPost()) {
            if($form->isValid($request->getPost())) {
                $authAdapter = new Zend_Auth_Adapter_DbTable();
                $authAdapter->setTableName('vartotojai')
                            ->setCredentialColumn('slaptazodis')
                            ->setIdentityColumn('slapyvardis')
                            ->setCredentialTreatment('MD5(?)')
                            ->setCredential($form->getValue('password'))
                            ->setIdentity($form->getValue('username'));
                $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($authAdapter);
                if($result->isValid()) {
                    $storage = $auth->getStorage();
                    $storage->write($authAdapter->getResultRowObject(array('vardas', 'pavarde', 'grupe')));
                    $this->_redirect('/');
                }
            }
        }
        $this->view->form = $form;
    }
    
    public function logoutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        Zend_Session::forgetMe();
        $this->_redirect('/');
    }
}

