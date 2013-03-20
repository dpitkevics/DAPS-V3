<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of View
 *
 * @author danpit134
 */

namespace Core\Base {

    class View extends \Core\Initializer{
        
        protected $_controller = null;
        protected $_view = null;
        protected $_baseFolder = BASE_PATH;
        
        public static function generateView($view, array $params) {
            extract ($params);
        }
        
    }

}
