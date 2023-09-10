<?php

namespace App\Repositories;

use App\Repositories\ProductRepositoryInterface;
use App\Models\Product;
use App\Core\Database\NativeDB;

class ProductRepository implements ProductRepositoryInterface{

     public  $model;
     public  $payload=[];

     public function __construct()
     {
        $this->model = new Product; 
     }

     public function products()
     {
        $this->payload['data']=[];

        foreach($this->model->get() as $product)
        {
          array_push($this->payload['data'],[
               "id"=>$product->id,
               "name" => $product->name,
               "description" => $product->description,
               "price" => $product->price,
               "category_id" => $product->category_id,
               "category_name" =>$product->category_name
             ]);
        }
          return $this->payload;
     }

     public function product($id)
     {  
        $this->payload['data']=[];
       
        $product = $this->model->get($id)[0];

          $this->payload['data']= [
               "id"=>$product->id,
               "name" => $product->name,
               "description" => $product->description,
               "price" => $product->price,
               "category_id" => $product->category_id,
               "category_name" =>$product->category_name
             ];

       return $this->payload;
     }

     public function add(array $product)
     {  
        $this->model->create($product);   
        return $this->product($this->model->lastId());
     }

     public function remove(int $id)
     {
        $this->model->purge($id); 
       return $id;    
     }

     public function update($id,$product)
     {  
        $this->model->update($this->model->table,$product,['id'=>$id]);
        return $this->product($id);
     }

     public function pages($num)
     {
        $data  = NativeDB::getInstance()->table('products')->paginate($num)??[];
        $links = $data?$data['links']:[];

        $this->payload['data']=[];

        if($data)
        {
              foreach($data[0] as $product)
              {
                array_push($this->payload['data'],[
                     "id"=>$product->id,
                     "name" => $product->name,
                     "description" => $product->description,
                     "price" => $product->price,
                     "category_id" => $product->category_id,
                     "category_name" =>$product->category_name
                   ]);
              }
        }

          return array_merge($this->payload,$links);
     }

}