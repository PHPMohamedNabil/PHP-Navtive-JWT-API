<?php

namespace App\Middlewares;
use Optimus\Onion\LayerInterface;
use App\Core\Request;
use App\Core\Response;
use Closure;
use RuntimeException;

class ViewValidationError implements LayerInterface
{   
    
    protected $excpet=[''];
    protected $response;


    public function peel($request,Closure $next)
    {    
          $response = $next($request);
          
         app()->style->assign('errors',session()->flush('errors')??'');
            
           return $response;
    
    }

    

}