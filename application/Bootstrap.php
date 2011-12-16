<?php

class Bootstrap  extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initNavigation()
    {
        if(!Zend_Registry::isRegistered('navigation')) {
            $nav = new Application_Model_Menu();
            Zend_Registry::set('navigation', $nav->getMenu());
            unset($nav);
        }
        
    }
}
