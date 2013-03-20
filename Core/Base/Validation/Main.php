<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Main
 *
 * @author danpit134
 */

namespace Core\Base\Validation {

    class Main extends \Core\Initializer {
        
        public static function Encode($string) {
            return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
        }
        
        public static function EncodeArray(array $data) {
            $d = array();
            foreach ($data as $key => $value) {
                if (is_string($key))
                    $key = htmlspecialchars($key, ENT_QUOTES, 'UTF-8');
                if (is_string($value))
                    $value = htmlspecialchars ($value, ENT_QUOTES, 'UTF-8');
                else if (is_array($value))
                    $value = self::EncodeArray ($value);
                $d[$key] = $value;
            }
            return $d;
        }
        
        public static function Exists($element) {
            return (isset($element) && $element!==null);
        }
        
    }

}
