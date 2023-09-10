<?php

namespace App\Migrations;

use App\Core\Database\NativeDB;

class users__2023_09_03_17_56_59{
      
     
	public function up($db)
	{
          $db->query('CREATE TABLE IF NOT EXISTS  `users` (
                 `id` BIGINT NOT NULL AUTO_INCREMENT,
                 `username` varchar(256) NOT NULL,
                 `password` VARCHAR(255) NOT NULL ,
                 `created` datetime NOT NULL,
				 `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
				PRIMARY KEY (`id`)

             )');
           

	}

     public function down($db)
     { 

  

     }
	   
}