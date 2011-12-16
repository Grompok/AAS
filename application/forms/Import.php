<?php

/**
 * 
 *
 * @author Darius <darius.lenkauskis@yahoo.com>
 */
class Application_Form_Import extends Zend_Form
{
    public function init()
    {
        $this->setEnctype(Zend_Form::ENCTYPE_MULTIPART);
        
        //file
        $file = new Zend_Form_Element_File('file');
        $file->setLabel("Pasirinkite faila")
             ->addValidator('Count', false, 1)
             ->addValidator('Extension', false, 'xls');
        $this->addElement($file);
        
        //submit
        $submit = new Zend_Form_Element_Submit('submit');
        $this->addElement($submit);
    }
}