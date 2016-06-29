<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::group(['prefix' => 'admin'], function(){
    Route::pattern('category', '[0-9]+');
    Route::pattern('product', '[0-9]+');

    Route::group(['prefix' => 'categories'], function(){
        Route::get('/', 'AdminCategoriesController@index');
        Route::get('{category}', function(\CodeCommerce\Category $category){
            return view('admin_category_single', compact('category'));
        });
        Route::post('{category}/edit', function(\CodeCommerce\Category $category){
            return 'Edit product';
        });
        Route::post('{category}/delete', function(\CodeCommerce\Category $category){
            return 'Delete product';
        });
    });

    Route::group(['prefix' => 'products'], function(){
        Route::get('/', 'AdminProductsController@index');
        Route::get('{product}', function(\CodeCommerce\Products $product){
            return view('admin_product_single', compact('product'));
        });
        Route::post('{product}/edit', function(\CodeCommerce\Category $product){
           return 'Edit product';
        });
        Route::post('{product}/delete', function(\CodeCommerce\Category $product){
            return 'Delete product';
        });
    });

});


