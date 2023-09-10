<?php
/**
 * JWT Auth life cycle trait (Generate,Validate,Preparing)
 * Inspired from article : https://roytuts.com/php-rest-api-authentication-using-jwt/
 * Adding some enhancements to suite the oop and to implement it to my project
 */

namespace App\Traits;

use App\Core\Database\NativeDB;
use App\Model\User;

trait JwtAuthTrait{

    protected $alg     ='SHA256';
    protected $alg_name='HS256'; 

    public function secret()
    {    
  	   return env('SECRET_KEY');
    }

    public function base64url_encode($data)
    {
       return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    } 

    public function getAuthorizationHeader()
    {
        $headers = null;
        
        if (isset($_SERVER['Authorization'])) {
            $headers = trim($_SERVER["Authorization"]);
        } else if (isset($_SERVER['HTTP_AUTHORIZATION'])) { //Nginx or fast CGI
            $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
        } else if (function_exists('apache_request_headers')) {
            $requestHeaders = apache_request_headers();
            // Server-side fix for bug in old Android versions (a nice side-effect of this fix means we don't care about capitalization for Authorization)
            $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
            //print_r($requestHeaders);
            if (isset($requestHeaders['Authorization'])) {
                $headers = trim($requestHeaders['Authorization']);
            }
        }
        
        return $headers;
   }

   public function getBearerToken()
   {
        $headers = $this->getAuthorizationHeader();
        
        // HEADER: Get the access token from the header
        if (!empty($headers)) {
            if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
                return $matches[1];
            }
        }
        return null;
   }

   public function jwtEncode($headers, $payload)
   {
        $headers_encoded = $this->base64url_encode(json_encode($headers));
        
        $payload_encoded = $this->base64url_encode(json_encode($payload));
        
        $signature = hash_hmac($this->alg, "$headers_encoded.$payload_encoded", $this->secret(), true);
        $signature_encoded = $this->base64url_encode($signature);
        
        $jwt = "$headers_encoded.$payload_encoded.$signature_encoded";
        
        return $jwt;
  }

  public function isJwtValid($jwt)
  {

        // split the jwt
        $secret = $this->secret();
        $tokenParts = explode('.', $jwt);
        $header = base64_decode($tokenParts[0]);
        $payload = base64_decode($tokenParts[1]);
        $signature_provided = $tokenParts[2];
        
        if(!$this->validateHeaderdata($header))
        {
            return false;
        }
        // check the expiration time - note this will cause an error if there is no 'exp' claim in the jwt
        $expiration = json_decode($payload)?->exp;
        $is_token_expired = ($expiration - time()) < 0;

        // build a signature based on the header and payload using the secret
        $base64_url_header = $this->base64url_encode($header);
        $base64_url_payload = $this->base64url_encode($payload);
        $signature = hash_hmac($this->alg, $base64_url_header . "." . $base64_url_payload, $secret, true);
        $base64_url_signature = $this->base64url_encode($signature);

        // verify it matches the signature provided in the jwt
        $is_signature_valid = ($base64_url_signature === $signature_provided);
        
        if ($is_token_expired || !$is_signature_valid) {
            return FALSE;
        } else {
            return TRUE;
        }
  }
  
  // validate header information (alg name) to mitigate alg none attack
  public function validateHeaderdata($received_header)
  { 
     $header = json_decode($received_header,true);

     if(isset($header['alg']) && $header['alg'] != $this->alg_name)
     {
         return false;
     }

         return true;
     

  }

  public function getPayload()
  {     
        $jwt        = explode('.',$this->getBearerToken());
        $payload    = json_decode(base64_decode($jwt[1]),true);

         return $payload;
  } 
 

}