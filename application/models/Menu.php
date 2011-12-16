<?php

/**
 * Menu Model
 *
 * @author Darius <darius.lenkauskis@yahoo.com>
 */
class Application_Model_Menu {

    private $menu = array(
        array(
            'label' => 'Pradinis langas',
            'controller' => 'index',
            'action' => 'index',
            'pages' => array(
                array(
                    'label' => 'Padalinių administravimas',
                    'controller' => 'unit',
                    'action' => 'index',
                    'pages' => array(
                        array(
                            'label' => 'Padalinio ataskaita',
                            'controller' => 'unit',
                            'action' => 'report',
                        ),
                        array(
                            'label' => 'Naujas padalinys',
                            'controller' => 'unit',
                            'action' => 'create',
                        ),
                        array(
                            'label' => 'Padalinio analizė',
                            'controller' => 'unit',
                            'action' => 'analysis',
                        ),
                    ),
                ),
                array(
                    'label' => 'Vartotojų administravimas',
                    'controller' => 'user',
                    'action' => 'index',
                    'pages' => array(
                        array(
                            'label' => 'Naujas vartotojas',
                            'controller' => 'user',
                            'action' => 'create',
                        ),
                    )
                ),
                array(
                'label' => 'IS administravimas',
                    'controller' => 'system',
                    'action' => 'index',
                    'pages' => array(
                        array(
                            'label' => 'Naujas IS',
                            'controller' => 'system',
                            'action' => 'create',
                        ),
                    )
                ),
                array(
                    'label' => 'Duomenų importavimas',
                    'controller' => 'data',
                    'action' => 'index',
                    'pages' => array(
                        array(
                            'label' => 'Naujį duomenys',
                            'controller' => 'data',
                            'action' => 'import',
                        ),
                    )
                ),
            ),
            ));

    public function getMenu() {
        return new Zend_Navigation($this->menu);
    }

}