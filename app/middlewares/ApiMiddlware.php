<?php

namespace App\Middlewares;
use Optimus\Onion\LayerInterface;
use App\Core\Request;
use App\Core\Response;
use Closure;
use RuntimeException;

class ApiMiddlware implements LayerInterface
{   
     public $response;
    
    public function __construct()
    {
         $this->response = new Response;
    }

    public function peel($request,Closure $next)
    {    
           
         $this->response->sendHeader('Access-Control-Allow-Orgin: *');
         $this->response->sendHeader("Content-Type: application/json; charset=UTF-8");
         $this->response->sendHeader("Access-Control-Max-Age: 3600");
         $this->response->sendHeader("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

           return $next($request);
    }

    

}