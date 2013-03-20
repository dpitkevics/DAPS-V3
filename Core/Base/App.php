<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of App
 *
 * @author danpit134
 */

namespace Core\Base {

    use Core\Devices;
    
    class App extends \Core\Initializer {
        
        public function __construct($name, $id) {
            parent::__construct($name, $id);
            
            $router = Devices\Router::findPage();
        }
        
    }

}
