<?php
use App\Core\Route\Router as Route;
use App\Controllers\ProductController;
use App\Controllers\UserController;

Route::middlewares('api',function(){
    
   Route::prefix('api/',function(){
      
      Route::resource(['product'=>ProductController::class]);

      Route::post('/user/register',[UserController::class,'store']);
      Route::get('/users/',[UserController::class,'allUsers'])->middleware('checktoken');
      Route::post('/user/login',[UserController::class,'userAuth']);

      Route::get('/user/profile',[UserController::class,'profile'])->middleware('checktoken');
      
   });



});