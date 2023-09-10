<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use App\Traits\AuthUserApiTrait;
use App\Database\NativeDB;

class UserRepository implements UserRepositoryInterface{
   
   use AuthUserApiTrait;

     public $model;

     public  $payload=[];

     public function __construct()
     {
          $this->model = new User;
     }

     public function registerOne($user)
     {
       return $this->model->create([
                              'username' =>$user['username'],
                              'password'=>$this->passwordHash($user['password'])
                             ]);
     }

     public function user($id)
     {

        $this->payload['data']=[];
       
        $user =$this->model->get($id)[0];

        $this->payload['data']= [
               "username" => $user->username
             ];
        
       return $this->payload;
     }

     public function users()
     {
        $this->payload['data']=[];

        foreach( $this->model->get() as $user)
        {
           array_push($this->payload['data'],[
               "id"=>$user->id,
               "username" => $user->username
             ]);
        }
          return $this->payload; 
     }

     public function remove($id)
     {
        $user = new User($id);
        return $user->purge();
     }

     public function update($id,$user)
     {
        $this->model->update($this->model->table,$user,['id'=>$id]);
        return $this->user($id);
     }

}