<?php

namespace App\Models;

use App\Core\Model;

class User extends Model
{  
    public $username,$password,$created,$modified;
	protected $mass = ['username','password'];
	
}