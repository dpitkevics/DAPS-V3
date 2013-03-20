<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Router
 *
 * @author danpit134
 */
namespace Core\Devices {

    use Core\Base\Validation;
    use Application\Config;
    use Application\Controllers;
    
    class Router extends Device {
        
        protected static $_module = null;
        protected static $_controller = null;
        protected static $_action = null;
        protected static $_view = null;
        
        public static function findPage($page = 'w', $view = 'v', $params = 'p') {
            $get = Validation\Get::Validate();
            if (isset($get[$page]) && $get[$page] !== null) {
                $p = $get[$page];
                if (strpos($p, '/') !== false) { 
                    $parts = explode('/', $p);
                    
                    if (count($parts) > 2) {
                        $this->_module = $parts[0];
                        array_shift($parts);
                    }
                    
                    foreach ($parts as $part) {
                        if (self::$_controller === null)
                            self::$_controller = $part;
                        else if (self::$_action === null)
                            self::$_action = $part;
                        else
                            break;
                    }
                } else {
                    self::$_controller = $p;
                    self::$_action = 'index';
                }
            } else {
                $config = Config\ClientConfig::getSystemConfigs();
                if (isset($config['Routing']) && !empty($config['Routing'])) {
                    $routing = $config['Routing'];
                    if (isset($routing['Controller']) && !empty($routing['Controller']))
                        self::$_controller = $routing['Controller'];
                    else
                        self::$_controller = 'Default';
                    
                    if (isset($routing['Action']) && !empty($routing['Action']))
                        self::$_action = $routing['Action'];
                    else
                        self::$_action = 'Index';
                    
                    if (isset($routing['Module']) && !empty($routing['Module']))
                        self::$_module = $routing['Module'];
                    else
                        self::$_module = null;
                }
            }
            
            self::loadPage((isset($get[$params]) && !empty($get[$params]))?$get[$params]:null);
        }
        
        protected static function loadPage($params) {
            $controllerString = '\\Application\\Controllers\\' . ucfirst(self::$_controller) . 'Controller';
            $actionString = '_' . ucfirst(self::$_action) . 'Action';
            
            $controller = new $controllerString();
            $controller->$actionString();
        }
               
    }

}
