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
    
    use Core\Exceptions\Children as Exception;
    
    require(dirname(__FILE__).'/Thing.php');
    require(dirname(__FILE__).'/Initializer.php');
          
    class Daps extends Initializer {
        
        public static $app = null;
        
        public static function Web($appName = 'default') {
            return new self($appName);
        }
        
        public function __construct($appName = 'default') {
            parent::__construct($appName, rand(100, 999));
            
            $this->requiringClasses();
            
            $config = Config\CoreConfig::getForCreating();
        }
        
        public function Run() {
            if (!self::$app)
                self::$app = new Base\App($this->_thingName, rand(100, 999));
            return self::$app;
        }
        
        public static function App() {
            return self::$app;
        }
        
        private function requiringClasses() {
            spl_autoload_register(array($this, 'autoload'));
        }
        
        private function autoload($class) {
            $filename = BASE_PATH . DS . $class . '.php';

            if (file_exists($filename))
                require $filename;
            else
                throw new Exception\CoreException('We cannot find used class "{class}". Is file and class names correct?',
                        array('{class}'=>$class));
        }
        
    }

}