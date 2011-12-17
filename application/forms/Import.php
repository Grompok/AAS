<?php

class Application_Form_Import extends Zend_Form
{
    public function init()
    {
        $this->setEnctype(Zend_Form::ENCTYPE_MULTIPART);
        
        $this->setAttrib('class', 'form-stacked');
        
        $file = new Zend_Form_Element_File('file');
        $file->setLabel("Pasirinkite faila")
             ->addValidator('Count', false, 1)
             ->setDecorators(array(
                 'File',
                 'Label',
                 array('HtmlTag', array('tag' => 'div', 'class' => 'clearfix'))
                 ))
             ->addValidator('Extension', false, 'xls');
             
        $this->addElement($file);
        
        //submit
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setDecorators(array('ViewHelper',array('HtmlTag', array('tag' => 'div', 'class' => 'clearfix')),));
        $submit->setAttrib('class', 'btn success');
        $this->addElement($submit);
    }
}