<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\MailController;
// use App\Http\Controllers\Frontend\BlogController;

// use App\Http\Controllers\Admin\EditController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group([
    // chỉ vào folder frontend
    'namespace' => 'Frontend'
], function () {

    Route::get('/', [FrontendController::class, 'index']);

    //checkout
    Route::get('/checkout', [App\Http\Controllers\Frontend\CheckoutController::class, 'index']);
    Route::post('/checkout', [App\Http\Controllers\Frontend\CheckoutController::class, 'createAccount']);
    Route::get('/send', [MailController::class, 'index']);

    //search
    Route::get('/searchadvanced', [FrontendController::class, 'showsearchadvanced']);
    Route::get('/search', [FrontendController::class, 'search']);
    Route::post('/searchprice', [FrontendController::class, 'searchprice']);
    Route::get('/product', [FrontendController::class, 'product']);
    Route::get('/productdetail/{id}', [FrontendController::class, 'productdetail']);
    Route::post('/ajaxcart2', [App\Http\Controllers\Frontend\CartController::class, 'create2']);

    //cart
    Route::get('/cart', [App\Http\Controllers\Frontend\CartController::class, 'index']);
    Route::post('/ajaxcart', [App\Http\Controllers\Frontend\CartController::class, 'create']);
    Route::post('/ajaxcart1', [App\Http\Controllers\Frontend\CartController::class, 'ajaxcart1']);

    //blog
    Route::get('/blogshop', [App\Http\Controllers\Frontend\BlogController::class, 'index']);
    Route::get('/blogshop/detail/{id}', [App\Http\Controllers\Frontend\BlogController::class, 'detail']);
    Route::post('/blogshop/rate', [App\Http\Controllers\Frontend\BlogController::class, 'blog_rate']);
    Route::post('/blogshop/comment/{id}', [App\Http\Controllers\Frontend\BlogController::class, 'blog_comment']);

    //membernotlogin
Route::group(['middleware' => 'memberNotLogin'], function () {

    Route::get('/shop/register', [App\Http\Controllers\Frontend\UserController::class, 'showregister']);
    Route::post('/shop/register', [App\Http\Controllers\Frontend\UserController::class, 'register']);
    Route::get('/shop/login', [App\Http\Controllers\Frontend\UserController::class, 'showlogin']);
    Route::post('/shop/login', [App\Http\Controllers\Frontend\UserController::class, 'login']);
});

    //member
Route::group(['middleware' => 'member'], function () {

    //account
    Route::get('/shop/logout', [App\Http\Controllers\Frontend\UserController::class, 'logout']);
    Route::get('/shop/account', [App\Http\Controllers\Frontend\UserController::class, 'account']);

    //updateaccount
    Route::post('/shop/account', [App\Http\Controllers\Frontend\UserController::class, 'editaccount']);

    //product
    Route::get('/shop/myproduct', [App\Http\Controllers\Frontend\ProductController::class, 'showmyproduct']);
    Route::get('/shop/addproduct', [App\Http\Controllers\Frontend\ProductController::class, 'showaddproduct']);
    Route::post('/shop/addproduct', [App\Http\Controllers\Frontend\ProductController::class, 'addproduct']);
    Route::get('/shop/editproduct/{id}', [App\Http\Controllers\Frontend\ProductController::class, 'showeditproduct']);
    Route::post('/shop/editproduct/{id}', [App\Http\Controllers\Frontend\ProductController::class, 'editproduct']);
    Route::get('/shop/deleteproduct/{id}', [App\Http\Controllers\Frontend\ProductController::class, 'destroy']);
    });


});
//backend
Auth::routes();

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Auth'
], function() {
    Route::get('/',[LoginController::class, 'showLoginForm']);
    Route::get('/login',[LoginController::class, 'showLoginForm']);
    Route::post('/login',[LoginController::class, 'login']);
    Route::get('/logout',[LoginController::class, 'logout']);
});
Route::group([
    'prefix' => 'admin', //add "admin" before link
    'namespace' => 'Admin',
    'middleware' => ['admin']
], function () {
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // // Route::get('/register', [App\Http\Controllers\HomeController::class, 'create'])->name('home');
    // Route::get('/xxx', [App\Http\Controllers\CustomersController::class, 'index'])->name('home');

    // Route::get('/yyy', [UserController::class, 'index']);
    //dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);
    //user
    Route::get('/user/update', [UserController::class, 'edit']);
    Route::post('/user/update', [UserController::class, 'update']);
    //country
    Route::get('/country', [CountryController::class, 'index']);
    Route::get('/country/add', [CountryController::class, 'create']);
    Route::post('/country/add', [CountryController::class, 'store']);
    Route::get('/country/delete/{id}', [CountryController::class, 'destroy']);
    //blog
    Route::get('/blog', [BlogController::class, 'index']);
    Route::get('/blog/add', [BlogController::class, 'create']);
    Route::post('/blog/add', [BlogController::class, 'store']);
    Route::get('/blog/edit/{id}', [BlogController::class, 'edit']);
    Route::post('/blog/edit/{id}', [BlogController::class, 'update']);
    Route::get('/blog/delete/{id}', [BlogController::class, 'destroy']);
    //category
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/category/add', [CategoryController::class, 'create']);
    Route::post('/category/add', [CategoryController::class, 'store']);
    Route::get('/category/delete/{id}', [CategoryController::class, 'destroy']);
    //brand
    Route::get('/brand', [BrandController::class, 'index']);
    Route::get('/brand/add', [BrandController::class, 'create']);
    Route::post('/brand/add', [BrandController::class, 'store']);
    Route::get('/brand/delete/{id}', [BrandController::class, 'destroy']);
    //sale
    Route::get('/sale', [SaleController::class, 'index']);
    Route::get('/sale/add', [SaleController::class, 'create']);
    Route::post('/sale/add', [SaleController::class, 'store']);
    Route::get('/sale/delete/{id}', [SaleController::class, 'destroy']);
});