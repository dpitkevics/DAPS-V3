<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author danpit134
 */

namespace Core\Base {

    class Controller extends \Core\Initializer {
        public function __call($name, $arguments) {
            if (!$this->beforeAction())
                return false;
            
            $name = substr($name, 1);
            
            $this->$name($arguments);
            
            if (!$this->afterAction())
                return false;
        }
        
        protected function Draw($view, $params, $output = true) {
            $view = View::generateView(ucfirst($view), $params);
            if ($output)
                echo $view;
            else
                return $view;
        }
        
        protected function beforeAction() {
            return true;
        }
        
        protected function afterAction() {
            return true;
        }
    }

}
