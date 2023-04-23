<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProductController;

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


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([
    'namespace' => 'Api'
], function () {
    //user
    Route::post('/login',[UserController::class, 'login']);
    Route::post('/register',[UserController::class, 'register']);
    //product
    Route::get('/product', [ProductController::class, 'productHome']);
    Route::get('/product/list',[ProductController::class, 'productList']);
    Route::get('/product/detail/{id}', [ProductController::class, 'detail']);

    Route::middleware(['auth:sanctum'])->group(function () {
        //updateaccount
        Route::post('/shop/account', [UserController::class, 'editaccount']);

        Route::get('/shop/myproduct', [ProductController::class, 'showmyproduct']);
        Route::get('/shop/product/{id}', [ProductController::class, 'show']);
        Route::post('/shop/addproduct', [ProductController::class, 'store']);
        Route::post('/shop/editproduct/{id}', [ProductController::class, 'update']);
        Route::post('/shop/deleteproduct/{id}', [ProductController::class, 'destroy']);
        Route::post('/blogshop/rate', [BlogController::class, 'rate']);
        Route::post('/blogshop/comment/{id}',[BlogController::class, 'comment']);

    });
    //category-brand
    Route::get('/category-brand',[ProductController::class, 'listCategoryBrand']);   
    //blog
    // http:://..../api/blogshop
    Route::get('blogshop',[BlogController::class, 'index']); 
    Route::get('blogshop/detail/{id}',[BlogController::class, 'show']);  
    Route::get('/blogshop/rate/{id}',[BlogController::class, 'rateBlog']);
    

    });