<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Config
 *
 * @author danpit134
 */
namespace Application\Config {

    class ClientConfig {
        public static function getSystemConfigs() {
            return array(
                'Routing' => array(
                    'Controller' => 'Default',
                    'Action' => 'Index',
                ),
                'DB' => array(
                    'Type' => 'mysqli',
                    'Connection' => array(
                        'Host' => 'localhost',
                        'User' => 'root',
                        'Pass' => '',
                        'DBase' => 'daps',
                    ),
                ),
            );
        }
    }

}

