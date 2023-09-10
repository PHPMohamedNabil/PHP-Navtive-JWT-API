<?php

namespace App\Migrations;

use App\Core\Database\NativeDB;

class products__2023_08_29_16_41_35{
      
     
	   public function up($db)
	   {
          $db->query("CREATE TABLE IF NOT EXISTS `products` (
				`id` int(11) NOT NULL AUTO_INCREMENT,
				`name` varchar(32) NOT NULL,
				`description` text NOT NULL,
				`price` decimal(10,0) NOT NULL,
				`category_id` int(11) NOT NULL,
				`created` datetime NOT NULL,
				`modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
				PRIMARY KEY (`id`)
				)");         

	   }

	   public function down($db)
	   { 

	  

	   }
	   
}