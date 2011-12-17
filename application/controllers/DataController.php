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
        if ($this->_request->isPost()) {
            if ($form->file->receive()) {
                $data = $form->file->getFileInfo();
                require_once('excel_reader2.php');
                $data = new Spreadsheet_Excel_Reader($data['file']['tmp_name']);

                //==============================================================
                //                  Padaliniu importavimas
                //==============================================================
                $padaliniai = new Application_Model_DbTable_Padaliniai();

                for ($i = 2; $i < $data->sheets[1]['numRows']+1; $i++) {
                    try {
                        $padaliniai->insert(array(
                            'Pad_Kodas' => $data->sheets[1]['cells'][$i][1],
                            'Pavadinimas' => $data->sheets[1]['cells'][$i][2],
                        ));
                    } catch (Zend_Db_Exception $zdb) {
                        //echo $zdb->getMessage();
                    }
                }
                unset($padaliniai);

                //==============================================================
                //                  IS importavimas
                //==============================================================

                $is = new Application_Model_DbTable_IS();

                for ($i = 2; $i < $data->sheets[2]['numRows']; $i++) {
                    try {
                        $is->insert(array(
                            'IS_kodas' => $data->sheets[2]['cells'][$i][1],
                            'Pavadinimas' => $data->sheets[2]['cells'][$i][2],
                        ));
                    } catch (Zend_Db_Exception $zdb) {
                        //echo $zdb->getMessage();
                    }
                }
                
                unset($is);
                
                //==============================================================
                //                  IS && Padaliniai importavimas
                //==============================================================
                
                $is_padaliniai = new Application_Model_DbTable_IsPadaliniai();
                
                $cols = $data->sheets[3]['numCols'] - 2;
                for ($i = 2; $i < $cols; $i++) {
                    for($j = 2; $j <= $cols+1; $j++) {
                        if(isset($data->sheets[3]['cells'][$i][$j]) 
                                && ($data->sheets[3]['cells'][$i][$j] === 1)) {
                            try {
                                $is_padaliniai->insert(array(
                                    'Pad_kodas' =>  $data->sheets[3]['cells'][1][$j],
                                    'IS_kodas' => $data->sheets[3]['cells'][$i][1],
                                ));    
                            } catch (Zend_Db_Exception $zdb) {
                                //$zdb->getMessage();
                            }
                        }
                    }
                }
                
                unset($is_padaliniai);
                
                //==============================================================
                //                  PriemoniuKryptis && ParaiskuPriemones
                //==============================================================
                
                $paramosPriemones = new Application_Model_DbTable_ParamosPriemones();
                $priemoniuKryptis = new Application_Model_DbTable_PriemoniuKryptis();
                $kryptis = 0;
                for($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
                    try {
                       if(isset($data->sheets[0]['cells'][$i][1])) {
                           $paramosPriemones->insert(array(
                               'Priem_kodas' => strtolower($data->sheets[0]['cells'][$i][1]),
                               'Pavadinimas' => $data->sheets[0]['cells'][$i][2],
                               'Krypt_kodas' => $kryptis,
                           ));
                       } else {
                           $kryptis++; 
                           $priemoniuKryptis->insert(array(
                               'Krypt_kodas' => $kryptis,
                               'Pavadinimas' => $data->sheets[0]['cells'][$i][2],
                           ));
                       }
                    } catch(Zend_Db_Exception $zbe) {
                        //echo $zbe->getMessage();
                    }
                }
                unset($kryptis);
                unset($paramosPriemones);
                
                //==============================================================
                //          Priemoniu kiekis
                //==============================================================
                
                $paramosKiekiai = new Application_Model_DbTable_ParamosKiekiai();
                
                for($i = 2; $i <= $data->sheets[5]['numRows']; $i++) {
                    try {
                        
                        $paramosKiekiai->insert(array(
                            'Priem_kodas' => $data->sheets[5]['cells'][$i][1], 
                            'Nuo' => $data->sheets[5]['cells'][$i][2],
                            'Iki' => $data->sheets[5]['cells'][$i][3],
                            'Kiekis' => $data->sheets[5]['cells'][$i][4],
                        ));
                        
                    } catch(Zend_Db_Exception $zbe) {
                       //echo $zbe->getMessage();
                    }
                }
                
                unset($paramosKiekiai);
                
                //==============================================================
                //          Paramos Administravimas
                //==============================================================
                
                var_dump($data->sheets[4]);
                
                $cols = $data->sheets[4]['numCols'] - 2;
                for ($i = 2; $i < $cols; $i++) {
                    for($j = 2; $j <= $cols+1; $j++) {
                        if(isset($data->sheets[4]['cells'][$i][$j]) 
                                && (is_integer($data->sheets[4]['cells'][$i][$j]) 
                                        || is_float($data->sheets[4]['cells'][$i][$j]))) {
                            echo $data->sheets[4]['cells'][$i][1];
//                            try {
//                                $is_padaliniai->insert(array(
//                                    'Priem_kodas' =>  $data->sheets[4]['cells'][$i][$j],
//                                    'Pad_kodas' => $data->sheets[4]['cells'][1][$j],
//                                    'Valandos'  => $data->sheets[4]['cells'][$i][1],
//                                ));    
//                            } catch (Zend_Db_Exception $zdb) {
//                                //$zdb->getMessage();
//                            }
                        }
                    }
                }
                
            }
        }
        $this->view->form = $form;
    }

}