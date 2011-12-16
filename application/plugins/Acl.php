<?php

/**
 * 
 *
 * @author Darius <darius.lenkauskis@yahoo.com>
 */
class Application_Plugin_Acl extends Zend_Controller_Plugin_Abstract
{
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        $resource = $request->getModuleName();
        if($resource === 'default') {
            $resource = $request->getControllerName();
        }
        
        $role = Application_Model_Acl::GUEST;
        $auth = Zend_Auth::getInstance();
        if($auth->hasIdentity()) {
            $role = Application_Model_Acl::USER;
        }
        
        $acl = new Application_Model_Acl();
        
        if(!$acl->isAllowed($role, $resource, $this->_request->getActionName())){
            if ($role === 'guest') {
                $request->setModuleName('default');
                $request->setControllerName('index');
                $request->setActionName('login');
            } else {
                $request->setModuleName('default');
                $request->setControllerName('error');
                $request->setActionName('notallowed');
            }
        }
    }
}