<?php

error_reporting(E_ALL);

define('DS', DIRECTORY_SEPARATOR);
define('BASE_PATH', dirname(__FILE__));
include 'Core/Daps.php';

$web = Core\Daps::Web();
$web->Run();