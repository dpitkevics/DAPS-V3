<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DefaultController
 *
 * @author danpit134
 */

namespace Application\Controllers {

    use \Core\Base\Controller;
    
    class DefaultController extends Controller {

        public function IndexAction() {
            $this->Draw('index', array('name'=>'Daniels'));
        }
        
    }

}
