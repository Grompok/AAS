<?php

class Application_Form_Login extends Zend_Form
{

    public function init()
    {
        $this->setAttrib('class', 'form-stacked');
        
        $this->setDecorators(array(
            'FormElements',
            'Form',
        ));
        
        //username
        $this->addElement('text', 'username', array(
            'label' => 'Slapyvardis',
            'required' => true,
            'filters' => array('StringToLower'),
            'validators' => array('Alnum'),
            'decorators' => array(
              'ViewHelper',
              'Label',
              array('HtmlTag', array('tag' => 'div', 'class' => 'clearfix')),
            ),
        ));

        //password
        $this->addElement('password', 'password', array(
            'label' => 'Slaptažodis',
            'required' => true,
            'validators' => array('Alnum'),
            'decorators' => array(
              'ViewHelper',
              'Label',
              array('HtmlTag', array('tag' => 'div', 'class' => 'clearfix')),
            ),
        ));

        $this->addElement('submit', 'Prisijungti', array(
            'style' => 'float: right;',
            'class' => 'btn success',
            'decorators' => 
            array(
              'ViewHelper',
            ),
        ));
    }

}