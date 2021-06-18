<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products', 'ProductsController@index')->name('products');
Route::post('/products/insert', 'ProductsController@insert')->name('product.insert');
Route::get('/products/delete/{id}', 'ProductsController@delete')->name('product.delete');
Route::post('/category/insert', 'CategoryController@insert')->name('category.insert');
Route::get('/category/delete/{id}', 'CategoryController@delete')->name('category.delete');
