<?php

namespace App\Startups;

use App\Repositories\ProductRepositoryInterface;
use App\Repositories\ProductRepository;
use App\Core\Container\Container;
use App\Startups\StartupInterface;
use App\Core\Database\NativeDB;
use App\Core\Request;
class ProductStartup implements StartupInterface
{
   
      
      public function startup()
      {  

      }

      public function register()
      {   
         app()::$container->set(ProductRepositoryInterface::class,ProductRepository::class);
      }

      
      
}