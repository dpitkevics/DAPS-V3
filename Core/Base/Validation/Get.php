<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Get
 *
 * @author danpit134
 */

namespace Core\Base\Validation {

    class Get extends \Core\Initializer {
        
        public static function Validate() {
            $g = $_GET;
            if (is_array($g) && !empty($g))
                return Main::EncodeArray($_GET);
            else if (is_array($g))
                return array();
            else if (!is_array($g) && $g)
                return Main::Encode ($g);
            else
                return null;
        } 
        
    }

}
