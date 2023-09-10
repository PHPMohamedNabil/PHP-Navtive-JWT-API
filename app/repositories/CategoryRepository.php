<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface{

     public  $model;
     public  $payload;

     public function __construct()
     {
        $this->model = new Category; 
     }

     public function category($id)
     { 
       $category =$this->model->get($id)[0];

       $this->payload['data']=[];
         
         array_push($this->payload['data'],
          [
            'id'            => $category->id,
            'name'          => $category->name,
            'description'   => $category->description,
            'issued_at'     => $category->created,
            'last_modified' => $category->modified
          ]);

       return  $this->payload;
     }

     public function categories()
     {
       $this->payload['data']=[];

        foreach($this->model->get() as $category)
        {
          array_push($this->payload['data'],
            [
              'id'            => $category->id,
              'name'          => $category->name,
              'description'   => $category->description,
              'issued_at'     => $category->created,
              'last_modified' => $category->modified
          ]);
        }
          return $this->payload;
     }

     public function add(array $category)
     {  
        $this->model->create($category);

        return $this->category($this->model->lastId());  
     }

     public function remove(int $id)
     {
       return $this->model->purge($id);     
     }

     public function update($id,$category)
     {
        $this->model->update($this->model->table,$category,['id'=>$id]);

        return $this->category($this->model->lastId());  
     }
}