<?php

class DataController extends Zend_Controller_Action
{
    public function indexAction()
    {
        
    }
    
    public function importAction()
    {
        $form = new Application_Form_Import();
        $data = null;
        if($this->_request->isPost()) {
            if($form->file->receive()) {
                $data = $form->file->getFileInfo();
                require_once('excel_reader2.php');
                $data = new Spreadsheet_Excel_Reader($data['file']['tmp_name']);
                var_dump($data->sheets[0]);
            }
        }
        $this->view->form = $form;
    }
}