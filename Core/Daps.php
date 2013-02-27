<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Daps
 *
 * @author danpit134
 */
namespace Core {

    require(dirname(__FILE__).'/Thing.php');
    require(dirname(__FILE__).'/Initializer.php');
    
    class Daps extends Initializer {
        
        public $app = null;
        
        public static function Web($appName = 'default') {
            return new self($appName);
        }
        
        public function __construct($appName = 'default') {
            parent::__construct($appName, rand(100, 999));
            
            $this->requiringClasses();
            
            $config = Config\CoreConfig::getForCreating();
        }
        
        public function Run() {
            if (!$app)
                $this->app = new Base\App();
            return $this->app;
        }
        
        private function requiringClasses() {
            spl_autoload_register(array($this, 'autoload'));
        }
        
        private function autoload($class) {
            $filename = BASE_PATH . DS . $class . '.php';
            if (file_exists($filename))
                require $filename;
        }
        
    }

}