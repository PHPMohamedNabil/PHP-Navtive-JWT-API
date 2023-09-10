<?php


define('CORE',APP.'core'.DS);
//config directories
define('CONFIG',APP.'config'.DS);
define('CONFIG_CONSTAN',APP.'config'.DS);
//controller,models and views dirs
define('CONTROLLERS',APP.'controllers'.DS);
define('MODELS',APP.'models'.DS);
define('MIGRATIONS',APP.'migrations'.DS);
define('REPOSITORY',APP.'repositories'.DS);
define('VIEWS',APP.'views'.DS);// remember cache of view files will be inside this view path under folder named temp

define('SESSION_PATH',ROOT_PATH.'app'.DS.'storage'.DS.'session'.DS);
define('SESSION_CONFIG',CONFIG.'session.php');

//webiste address and routes
define('ROUTES_WEB',APP.'routes');
define('SITE_URL','http://localhost:8000/');
define('SITE_AD_URL','http://localhost:8000/admin/');
define('VENDOR',ROOT_PATH.'vendor'.DS);

define('UPLOADS',ROOT_PATH.'public'.DS.'uploads'.DS);
define('MIDDLEWARES',APP.'config'.DS);