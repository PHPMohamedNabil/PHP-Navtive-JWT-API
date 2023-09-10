<?php
//parent directories
define('DS',DIRECTORY_SEPARATOR);
define('ROOT_PATH',dirname(__DIR__).DS);
define('APP',ROOT_PATH.'app'.DS);
define('PUBLIC_PATH',ROOT_PATH.'public'.DS);

require_once (__DIR__.'/../app/config/config_constants.php');
require_once __DIR__.'/../vendor/autoload.php';