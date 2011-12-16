<?php

/**
 * User Form
 *
 * @author Darius <darius.lenkauskis@yahoo.com>
 */
class Application_Form_User extends Zend_Form 
{
    //TODO validation
    public function init()
    {
        //firsname
        $this->addElement('text', 'firstname', array(
            'label' => 'Vardas',
        ));
        
        //lastname
        $this->addElement('text', 'lastname', array(
            'label' => 'Pavardė',
        ));
        
        //username
        $this->addElement('text', 'username', array(
            'label' => 'Prisijungimo vardas',
        ));
        
        //pass1
        $this->addElement('password', 'password1', array(
            'label' => 'Slaptažodis',
        ));
        
        //pass2
        $this->addElement('password', 'password2', array(
            'label' => 'Pakartokite slaptažodis',
        ));
        
        $this->addElement('checkbox', 'admin', array(
            'label' => 'Administratorius?',
        ));
        
        //submit
        $this->addElement('submit', 'Ivesti');
    }
}