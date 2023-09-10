<?php

namespace App\Startups;

use App\Repositories\BookInterface;
use App\Repositories\BookRepository;
use App\Core\Container\Container;
use App\Startups\StartupInterface;
use App\Core\Database\NativeDB;
use App\Core\Request;
class TimeZoneStartup implements StartupInterface
{
   //timezone service provider if you are saving timezone in db
   //and wants to change it before application startup
      
      public function startup()
      {  
   //$db = NativeDB::getInstance()->table('settings')->select('timezone')->run();
        //config()->set('date_default_timezone_set',$db[0]->timezone);

        //example:'Europe/Moscow'     
      }

      public function register()
      {   
         
      }

      
      
}