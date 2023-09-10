<?php

namespace App\Traits;

use App\Core\Database\NativeDB;
use App\Models\User;
use App\Traits\JwtAuthTrait;
use App\Core\Request;

trait AuthUserApiTrait{

    use JwtAuthTrait;

    //return login the user and return jwt token
    public function userAuth(Request $request)
    {   
        $data = $request->getBody();
        
        $user = NativeDB::getInstance()->table('users')->select('username','password','id')->where('username','=',$data['username'])->run();
           
        if(count($user)>0)
        {   
           if($this->passwordCheck($data['password'],$user[0]->password))
           {
                $payload = [
                          'id' => $user[0]->id,
                          'exp'  => time() + 60,
                          'iat'  => time(),
                          'iss'  => SITE_URL
                         ];

              $header  = ['alg'=>'HS256','typ'=>'JWT'];
              $token   = $this->jwtEncode($header,$payload);
                 
                return app()->response::json([
                   'token'=> $token         
                 ]);
                  
           }

        }

             return app()->response::json([
                'code'=>app()->response->httpResponse(404),
                'message'=>'invalid username or password'
             ]); 

    }
    
    public function userFromToken()
    {
        $payload = $this->getPayload();

        return $payload;

    }

    public function passwordHash($password)
    {
        return password_hash($password,PASSWORD_DEFAULT);
    }

    public function passwordCheck($password,$db_password)
    {
       return password_verify($password,$db_password);
    }

}
