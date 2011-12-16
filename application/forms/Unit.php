<?php

/**
 * Unit Form
 *
 * @author Darius <darius.lenkauskis@yahoo.com>
 */
class Application_Form_Unit extends Zend_Form
{
    public function init()
    {
        //code
        $this->addElement('text', 'code', array(
            'label' => 'Padalinio kodas',
        ));
        
        //pavadinimas
        $this->addElement('text', 'code', array(
            'label' => 'Padalinio pavadinimas',
        ));
        
        //submit
        $this->addElement('submit', 'Ivesti');
    }
}