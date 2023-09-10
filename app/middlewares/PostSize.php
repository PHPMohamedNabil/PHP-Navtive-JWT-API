<?php

namespace App\Middlewares;
use Optimus\Onion\LayerInterface;
use App\Core\Request;
use Closure;
use RuntimeException;

class PostSize implements LayerInterface
{   
    

    public function peel($request,Closure $next)
    {   
      
         if($request->getMethod() =='post')
         { 
         	 $request_post_size =(isset($_SERVER['CONTENT_LENGTH']) && is_integer($_SERVER['CONTENT_LENGTH']))?$_SERVER['CONTENT_LENGTH']:0;
             
         	 $post_size   = ini_get('post_max_size');

         	 if($request_post_size>$post_size)
         	 {
         	 	throw new RuntimeException('Request post size is over the one in settings');
         	 }
             
         }
           
           return $next($request);
    
    }

    

}
