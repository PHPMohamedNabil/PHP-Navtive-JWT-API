<?php

namespace App\Migrations;

use App\Core\Database\NativeDB;

class categories__2023_08_29_16_40_30{
      
     
	   public function up($db)
	   {
            $db->query("CREATE TABLE IF NOT EXISTS `categories` (
					`id` int(11) NOT NULL AUTO_INCREMENT,
					`name` varchar(256) NOT NULL,
					`description` text NOT NULL,
					`created` datetime NOT NULL,
					`modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
					PRIMARY KEY (`id`))");
           
	   }

	   public function down($db)
	   { 

	  

	   }
	   
}