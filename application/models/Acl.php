<?php

/**
 * Access Control
 *
 * @author Darius <darius.lenkauskis@yahoo.com>
 */
class Application_Model_Acl extends Zend_Acl
{
    /*
     * ACL Roles
    */
    const GUEST = 'guest';
    const CLIENT = 'user';
    const ADMIN = 'admin';
    
    /*
     * ACL Resources
     */
    const INDEX  = 'index';
    const ERROR  = 'error';
    const UNIT   = 'unit';
    const SYSTEM = 'system';
    const USER   = 'user';
    const DATA   = 'data';
    
    public function __construct()
    {
        $this->addRole(self::GUEST)
             ->addRole(self::CLIENT)
             ->addRole(self::ADMIN, self::CLIENT);
        
        $this->addResource(self::INDEX)
             ->addResource(self::ERROR)
             ->addResource(self::USER)
             ->addResource(self::UNIT)
             ->addResource(self::DATA)
             ->addResource(self::SYSTEM);
        
        //GUEST
        $this->allow(self::GUEST, array(self::INDEX, self::ERROR));
        
        $this->deny(self::GUEST, self::INDEX, array('logout', 'index'));
        $this->deny(self::GUEST, array(self::DATA, self::UNIT, self::USER, self::SYSTEM));
        
        //USER
        $this->allow(self::CLIENT, array(self::INDEX, self::ERROR, self::SYSTEM, self::UNIT, self::DATA, self::USER));
        
        $this->deny(self::CLIENT, self::INDEX, 'login');
        
        
        //ADMIN
        
    }
}