<?php

namespace App\Middlewares;
use Optimus\Onion\LayerInterface;
use App\Core\Request;
use App\Traits\JwtAuthTrait;
use Closure;
use RuntimeException;

class isLogedIn implements LayerInterface
{   
    
  use JwtAuthTrait;

    public function peel($request,Closure $next)
    {   
      
         if(!$this->isJwtValid($this->getBearerToken()))
         {  
            $code = app()->response->httpResponse(401);
             return app()->response::json(['code'=>$code,'message'=>'Invalid Access Token']);
         }
           
           return $next($request);
    
    }

    

}
