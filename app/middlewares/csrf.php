<?php

namespace App\Middlewares;
use Optimus\Onion\LayerInterface;
use App\Core\Request;
use App\Core\Response;
use Closure;
use RuntimeException;

class csrf implements LayerInterface
{   
    
    public function __construct(protected $excpet=[''],protected $response = new Response)
    {
         
    }

    public function peel($request,Closure $next)
    {    
      
         if(!in_array($request->Qstring(),$this->excpet))  
         { 
            if($request->getMethod() =='post')
            {  
              if($request->isAjax())
              {
                  if(csrf_ajax() == false)
                  {
                     $this->response->httpResponse(419);
                
                     return $this->response->json(['error'=>'token missmatch','status'=>419]);
                  }
                    
              }
              elseif(csrf_token() == false)
              {
                 //refer to csrf_token functions.php
                  $this->response->httpResponse(419);
                
                 return view('errors.error',['message'=>'Csrf token missmatch','respond'=>419]);
              }
              
            }

         }
                  
           return $next($request);
    
    }

    

}