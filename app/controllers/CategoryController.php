<?php

namespace App\Controllers;

use App\Core\Controller;
use Style\Style;

class CategoryController extends Controller
{  
   
   public function __construct()
	 {
	 	//middleware_array,except_methods array(optional)
        //$this->middleware(['test']);
	 }

	public function index()
	{
        // $request->validate(['username'=>'required|min:2']);
       // $model = new model(12);
		//$model->columns['model_title']='updated';   
		//$model->columns['model_price']=2500000;  
         
       
        //$model->create(['model_title'=>'coding model']); //for mass assignment
		//$model->save(); //for insert
		//$model->amend();// for update
		//$model->purge(); //for delete
		//$model->deleteSoft(12); //for soft delete       
	}

	public function create()
	{

	}

	public function store()
	{

	}

	public function show($id)
	{

	}

	public function edit($id)
	{

	}
	
	public function update()
	{

	}

	public function destroy($id)
	{

	}

}