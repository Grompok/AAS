<?php

/**
 * System Form
 *
 * @author Darius <darius.lenkauskis@yahoo.com>
 */
class Application_Form_System extends Zend_Form
{
    public function init()
    {
        //name
        $this->addElement('text', 'name', array(
            'label' => 'IS pavadinimas'
        ));
        
        //units
        $this->addElement('multicheckbox', 'units', array(
            'label' => 'Padaliniai kurie naudojasi IS',
            'multioptions' => array(
                'Padainys1', 
                'Padainys2', 
                'Padainys3', 
                'Padainys4'
            )
        ));
        
        //submit
        $this->addElement('submit', 'Ivesti');
    }
}