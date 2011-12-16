<?php

/**
 * Login Form
 *
 * @author Darius <darius.lenkauskis@yahoo.com>
 */
class Application_Form_Login extends Zend_Form
{
    public function init()
    {
        //username
        $this->addElement('text', 'username', array(
            'label' => 'Slapyvardis',
            'required' => true,
            'filters' => array('StringToLower'),
            'validators' => array('Alnum')
        ));
        
        //password
        $this->addElement('password', 'password', array(
            'label' => 'Slaptažodis',
            'required' => true,
            'validators' => array('Alnum')
        ));
        
        $this->addElement('submit', 'Prisijungti', array(
            
        ));
    }
}