<?php

define('CoreStart',microtime());

use App\Core\Request;
use App\Core\Response;
use App\Core\http\Kernal;

require('autoload.php');

$app= require_once __DIR__.'/../bootstrap'.DS.'bootstrap.php';

$kernal = new Kernal;

$kernal->lightOn();

$kernal->handle(new Request,$app);

$kernal->lightOff();







 


