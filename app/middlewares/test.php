<?php

namespace App\Middlewares;
use Optimus\Onion\LayerInterface;
use App\Core\Request;
use App\Core\Response;
use Closure;
use RuntimeException;

class test implements LayerInterface
{   
    
    protected $excpet=[''];
    protected $response;

    public function __construct()
    {
         $this->response = new Response;
    }

    public function peel($request,Closure $next)
    {    
          dd('middleware running on this route');
                  
           return $next($request);
    
    }

    

}