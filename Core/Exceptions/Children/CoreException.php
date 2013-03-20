<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CoreException
 *
 * @author danpit134
 */
namespace Core\Exceptions\Children {

    use Core\Exceptions\BaseException;
    
    class CoreException extends BaseException {
        
        public function __construct($string, $vars = array()) {
            if (!is_array($vars))
                throw new CoreException('Exception class second constructor paramter should be array');
            if (count($vars)>0) {
                foreach ($vars as $key => $var) {
                    if (strpos($string, $key)===false)
                        throw new CoreException('Exception variable is not found in string');
                    if (strlen($var)<1)
                        throw new CoreException('Exception variable is empty');
                    $string = str_replace($key, $var, $string);
                }
            }
            
            $this->setUserMessage($string);
            //return parent::__construct($string, 0, null);
        }

    }
    
}
