<?php

namespace App\Repositories;

interface ProductRepositoryInterface{

	// write interface functions here

	public function products();
	public function product(int $id);
	public function add(array $product);
	public function remove(int $id);
	public function update($id,$product);
	
}