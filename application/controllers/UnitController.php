<?php

/**
 * 
 *
 * @author Darius <darius.lenkauskis@yahoo.com>
 */
class UnitController  extends Zend_Controller_Action
{
    /**
     *
     * @var Application_Model_DbTable_Padaliniai 
     */
    private $_db;
    
    public function init()
    {
        if($this->_db === null) {
            $this->_db = new Application_Model_DbTable_Padaliniai();
        }   
    }
    
    public function indexAction()
    {
        $this->view->units = $this->_db->fetchAll();
    }
    
    public function reportAction()
    {
        
    }
    
    public function analysisAction()
    {
        
    }
    
    public function createAction()
    {
        
    }
    
    public function deleteAction()
    {
        
    }
    
    public function editAction()
    {
        
    }
}