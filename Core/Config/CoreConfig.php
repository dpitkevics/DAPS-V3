<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CoreConfig
 *
 * @author danpit134
 */

namespace Core\Config {
    
    use Application\Config as AppConf;

    class CoreConfig {
        public static function getForCreating() {
            $reflection = new \ReflectionClass(__NAMESPACE__ . '\\CoreConfig');
            $methods = $reflection->getMethods(\ReflectionMethod::IS_STATIC);

            $config = array();
            foreach ($methods as $method) {
                $staticMethodName = __NAMESPACE__ . '\\CoreConfig::' . $method->name;
                if ($staticMethodName === __METHOD__) continue;
                $config[strtolower(str_replace('Configs', '', str_replace('get', '', $method->name)))] = call_user_func($staticMethodName);
            }
            return $config;
        }
        
        private static function getAboutConfigs() {
            return array(
                'FrameWorkName' => 'DAPS',
                'FrameWorkVersion' => '0.0.0.1',
                'FrameWorkAuthor' => array(
                    'name' => 'Daniels Pitkevičs',
                    'email' => 'daniels.pitkevics@gmail.com',
                    'website' => 'http://danielspitkevics.id.lv',
                ),
                'FrameWorkStartDate' => '27.02.2013',
            );
        }
        private static function getSystemConfigs() {
            $systemConfigs = AppConf\ClientConfig::getSystemConfigs();
            $systemConfigs[] = array(
                'CoreSystemConfigSample' => 'Test',
            );
            return $systemConfigs;
        }
    }

}