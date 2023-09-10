<?php

namespace App\Controllers;

use App\Core\Controller;
use Style\Style;
use App\Repositories\UserRepositoryInterface;
use App\Models\User;
use App\Traits\AuthUserApiTrait;
use App\Core\Request;

class UserController extends Controller
{  
	  private $user;
    
     use AuthUserApiTrait;
	
	 public function __construct(UserRepositoryInterface $user)
	 {
	 	$this->user = $user;
	 }

	 public function store(Request $request)
	 {
	 	$data = $request->getBody() ?? json_decode(file_get_contents("php://input", true));

	 	$register_user = $this->user->registerOne($data);
	 	
	 	return $register_user?app()->response::json(['code'=>app()->response->httpResponse(200),'message'=>'User registered successfully']):app()->response::json(['code'=>app()->response->httpResponse(500),'message'=>'database error please try to send the request again']);
	 	  
	 }
     
     //users list for testing.
	 public function allUsers(Request $request)
	 {
	 	return app()->response::json($this->user->users());
	 }
     
     //show auth user data profile
	 public function profile()
	 {
	 	$user_data = $this->userFromToken();
	 	return app()->response::json($this->user->user($user_data['id']));
	 }

}