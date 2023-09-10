<?php

namespace App\Startups;

use App\Repositories\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Core\Container\Container;
use App\Startups\StartupInterface;
use App\Core\Database\NativeDB;
use App\Core\Request;
class UserStartup implements StartupInterface
{
   
   public function startup()
   {  

   }

   public function register()
   {   
    app()::$container->set(UserRepositoryInterface::class,UserRepository::class);
   }

      
      
}