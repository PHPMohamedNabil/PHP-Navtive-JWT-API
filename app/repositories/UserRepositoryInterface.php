<?php

namespace App\Repositories;

interface UserRepositoryInterface{

	// write interface functions here

	public function users();
	public function user(int $id);
	public function registerOne(array $user);
	public function remove(int $id);
	public function update($id,$user);
	
}