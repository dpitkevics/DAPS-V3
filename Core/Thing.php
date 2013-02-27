<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Thing
 *
 * @author danpit134
 */
namespace Core {

    class Thing {
        protected $_thingName;
        protected $_thingId;
        
        private $_data;
        
        public function __construct($name, $id) {
            $this->_thingName = $name;
            $this->_thingId = $id;
        }
        
        public function __get($name) {
            $getter = 'get'.$name;
            if (method_exists($this, $getter))
                return $this->$getter();
            elseif (isset($this->_data[$name]))
                return $this->_data[$name];
            throw new CoreException('We cannot find requested propery - {class}.{property}.',
                    array('{class}' => get_class($this), '{property}' => $name));
        }
        
        public function __set($name, $value) {
            $setter = 'set'.$name;
            if (method_exists($this, $setter))
                return $this->$setter($value);
            else {
                $this->_data[$name] = $value;
                return true;
            }
        }
        
        public function __isset($name) {
            $getter = 'get'.$name;
            if (method_exists($this, $getter))
                return $this->$getter()!==null;
            else
                return isset($this->_data[$name]);
        }
        
        public function __unset($name) {
            $setter = 'set'.$name;
            if (method_exists($this, $setter))
                return $this->$setter(null);
            elseif(isset($this->_data[$name]))
                return $this->unsetThing($name);
            else
                throw new CoreException('We cannot find requested propery - {class}.{property}.',
                    array('{class}' => get_class($this), '{property}' => $name));
        }
        
        public function __call($name, $arguments) {
            if ($this->_data !== null) {
                foreach ($this->_data as $object) {
                    if (is_object($object))
                        if ($object->isOn() && method_exists($object, $name))
                            return call_user_func_array (array($object, $name), $arguments);
                }
            }
        }
        
        public function unsetThing($name) {
            return $this->_data[$name] = null;
        }
        
        public function isOn() {
            if (isset($this) && is_object($this))
                return true;
        }
    } 

}