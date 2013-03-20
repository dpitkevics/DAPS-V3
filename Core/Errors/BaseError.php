<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseError
 *
 * @author danpit134
 */
namespace Core\Errors {

    use Core\Errors\Children as ErrorNS;
    
    class BaseError {
        public static function HandleError($errno, $errstr, $errfile, $errline) {
            if (!(error_reporting() & $errno)) {
                return;
            }
            
            switch ($errno) {
                case E_USER_ERROR:
                    echo new ErrorNS\UserError($errstr, $errfile, $errline);
                    break;
                case E_USER_WARNING:
                    echo new ErrorNS\UserWarning($errstr, $errfile, $errline);
                    break;
                case E_USER_NOTICE:
                    echo new ErrorNS\UserNotice($errstr, $errfile, $errline);
                    break;
                default:
                    echo new ErrorNS\UnknownError($errstr, $errfile, $errline);
                    break;
            }
            
            return true;
        }
    }

}
