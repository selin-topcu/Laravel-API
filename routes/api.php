<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/merhaba',function (){
    return "Merhaba gençler";
});

Route::get('/users',function (){
    return factory(Users::class,10)->make();
});

//Route::apiResource('/product','Api\ProductController');
//Route::apiResource('/users','Api\UserController');
//Route::apiResource('/categories','Api\CategoryController');
Route::apiResources([
    'products'=> 'Api\ProductController',
    'users'=> 'Api\UserController',
    'categories'=>'Api\CategoryController'

]);
