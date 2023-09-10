<?php

namespace App\Repositories;

interface CategoryRepositoryInterface{

	// write interface functions here
	public function categories();
	public function category(int $id);
	public function add(array $category);
	public function remove(int $id);
	public function update($category);
}