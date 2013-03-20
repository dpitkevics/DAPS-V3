<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Initializer
 *
 * @author danpit134
 */
namespace Core {

    class Initializer extends Thing {
        
        protected static function Init($name = 'default', $id = '00001') {
            return new self($name, $id);
        }
        
    }

}