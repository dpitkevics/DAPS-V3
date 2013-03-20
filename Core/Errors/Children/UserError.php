<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserError
 *
 * @author danpit134
 */
namespace Core\Errors\Children {

    class UserError extends BaseError {
        
        private $errstr, $errfile, $errline;
        
        public function __construct($errstr, $errfile, $errline) {
            $this->errstr = $errstr;
            $this->errfile = $errfile;
            $this->errline = $errline;
        }
        
        public function __toString() {
            $return = "
                <div class='error-box'>
                    <div class='error-type'>
                        <strong>Error:</strong>
                    </div>
                    <div class='error-string'>
                        $this->errstr
                    </div>
                    <div class='error-description'>
                        Fatal error on line $this->errline in file $this->errfile
                    </div>
                </div>
            ";
            return $return;
        }
        
    }

}
