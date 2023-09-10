<?php
use App\Core\Http\Middleware\valid;
use App\Core\Http\Middleware\valid_2;
use App\Middlewares\csrf;
use App\Middlewares\PostSize;
use App\Middlewares\test;
use App\Middlewares\XcsrfCookie;
use App\Middlewares\ViewValidationError;
use App\Middlewares\ApiMiddlware;
use App\Middlewares\isLogedIn;

return[
        //startup application middleware here
      'web'=>[
               ViewValidationError::class,
               csrf::class,
               XcsrfCookie::class,
           
        ],
        //routes middlewares here example: ['middleware_name'=>'middleware']
      'route'=>[
           'test'        => test::class,
           'api'         => ApiMiddlware::class,
           'checktoken'  => isLogedIn::class
      ]
];