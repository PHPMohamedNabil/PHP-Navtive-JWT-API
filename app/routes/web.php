<?php
use App\Core\Route\Router as Route;


Route::get('/','start');

//api routes
require_once 'api.php';
