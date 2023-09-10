<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Repositories\ProductRepositoryInterface;
use Style\Style;
use App\Core\Request;

class ProductController extends Controller
{  
	private $product;
   
   public function __construct(ProductRepositoryInterface $repository)
	{
	   $this->product  = $repository;	     
	}

	public function index()
	{      
		//app()->response->httpResponse(200);
      return app()->response::json($this->product->products());
	}

	public function store(Request $request)
	{
		return app()->response::json($this->product->add($request->getBody()));
	}

	public function show($id)
	{
     return app()->response::json($this->product->product($id));
	}
	
	public function update($id,Request $request)
	{
		//receiving row data from put request.
		
		$data = json_decode(file_get_contents("php://input"),true);

		return app()->response::json($this->product->update($id,$data));  
	}

	public function destroy($id)
	{
      return app()->response::json($this->product->remove($id));  
	}
	

}