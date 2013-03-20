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
namespace Core\Exceptions {

    class BaseException extends \Exception {
        
        protected $userMessage = null;
        protected $pattern = null;
        
        public function setUserMessage($message) {
            $this->userMessage = $message;
        }
        
        public function getUserMessage() {
            return $this->userMessage;
        }
              
        public function __toString() {
            return $this->getUserMessage();
        }
    }
    
}
