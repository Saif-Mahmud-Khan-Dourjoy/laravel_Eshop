<?php

//php artisan confog:cache
//php artisan view:clear
//composer dump-autoload

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

Route::get('/','Frontend\PagesController@index')->name('index');
Route::get('/contact','Frontend\PagesController@contact')->name('contact');

// product frontend

Route::get('/product','Frontend\ProductController@index')->name('products');
Route::get('/product/{slug}','Frontend\ProductController@show')->name('product.show');
Route::get('/search','Frontend\ProductController@search')->name('search');






Route::group(['prefix'=>'admins'],function(){
Route::get('/','Backend\PagesController@index')->name('admin.index');

// Product 

Route::group(['prefix'=>'product'],function(){

Route::get('/create','Backend\ProductsController@product_create')->name('admin.product.create');
Route::post('/create','Backend\ProductsController@product_store')->name('admin.product.store');

Route::get('/all','Backend\ProductsController@product_all')->name('admin.product.all');
Route::get('/edit/{id}','Backend\ProductsController@product_edit')->name('admin.product.edit');
Route::post('/update/{id}','Backend\ProductsController@product_update')->name('admin.product.update');
Route::post('/delete/{id}','Backend\ProductsController@product_delete')->name('admin.product.delete');

});

//Category

Route::group(['prefix'=>'categories'],function(){

Route::get('/create','Backend\CategoryController@category_create')->name('admin.category.create');
Route::post('/create','Backend\CategoryController@category_store')->name('admin.category.store');

Route::get('/all','Backend\CategoryController@category_all')->name('admin.category.all');
Route::get('/edit/{id}','Backend\CategoryController@category_edit')->name('admin.category.edit');
Route::post('/update/{id}','Backend\CategoryController@category_update')->name('admin.category.update');
Route::post('/delete/{id}','Backend\CategoryController@category_delete')->name('admin.category.delete');

});

});


