<?php

namespace App\Models;

use App\Core\Model;

class Product extends Model
{  
	//you have to set table attributes her $id,$column_2,$column_3 ...
	//you should set table name attribute or we can predict it like User to be users ,UserCategory user_categories
	public $id,$name,$description,$price,$category_id,$created,$modified;
	protected $mass=['id','name','description','price','category_id'];
	
}